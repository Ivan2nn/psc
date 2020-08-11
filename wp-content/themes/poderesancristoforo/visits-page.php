<?php
/**
* Template Name: Visits Custom Page
*/


get_header(); ?>
<!-- <?php //get_template_part('simple-page-lander'); ?> -->

<section id="visits" class="psc-section">
	<div class="container-fluid">

<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published',
		'category_name' => 'visits'
	);

	$arr_posts = new WP_Query($args);

	$i = 0;

	if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		
			    <div class="row equal">
		            <div class="col-md-12 col-lg-7 px-0 order-lg-1 order-first mimi-img overflow-hidden">
		            	<?php
		            	if ( get_the_post_thumbnail(get_the_id()) != '' ) {
							the_post_thumbnail(array('class' => 'align-items-center'));
						} else {

							
							echo '<img src="';
							echo catch_that_image();
							echo '" alt="" class=" align-items-center"/>';

						}
		                //<img class="d-flex align-items-center" src="<?php echo $image[0]; ?> <!--">-->
		            </div>
		            <?php 
		            	if ($i%2 == 0) {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey overflow-hidden d-flex align-items-center'>";
		            		echo "<div class='psc-article w-100 bg-grey'>";
		            	} else {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white fg-black overflow-hidden d-flex align-items-center'>";
		            		echo "<div class='psc-article w-100 bg-white fg-black'>";
		            	}
		            	echo the_content();
		            ?>
		                 
					

		                </div>

		            </div>
		        </div>  

		<?php $i++; ?>
	<?php

	endwhile; endif;
?>
		
	<form action="" method="post" id="request-visit-send">
        <div class="row equal">
            <div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
                <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/Tasting_Room_PSC.jpg">
            </div> 
            <div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white d-flex align-items-center">               
                    <div class="psc-article w-100 bg-white fg-black ">
	                        <div class="row">
	                        	<input type="text" hidden="hidden" name="visit-checkin" id="visit-checkin">
	                    		<div id="visits-calendar" class="mx-auto mt-2">
	                    			
	                    		</div>
	                    	</div>
	                    	<h3 class="mt-4"><?php pll_e('visitDate_str'); ?><span id="visits-day" class="ml-2"></span> /<span id="visits-month"></span> /<span id="visits-year"></span></h3>
                        
                    </div> 
            </div>
            
            
        </div>		

		<div class="row equal">
			<div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
			    <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/DSCF9100_Snapseed_new.jpg">
			</div> 
			<div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey d-flex align-items-center">               
		        <div class="psc-article w-100 bg-grey fg-white ">
		        	<h2><?php pll_e('registration_str'); ?></h2>
		        	<h3><?php pll_e('yourData_str'); ?></h3>
		        	<div class="row">
		        		<input type="hidden" id="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>"/>
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Nome e Cognome</span><input required="required" id="visit-name" class="visits-information border-white" name="visit-name"></input> 
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Telefono</span><input required="required" id="visit-phone" class="visits-information border-white" name="visit-phone"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Email</span><input required="required" id="visit-email" class="visits-information border-white" name="visit-email"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Numero di persone (max 20)</span><input required="required" id="visit-numPeople" class="visits-information border-white" name="visit-numPeople"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Città di provenienza</span><input required="required" id="visit-city" class="visits-information border-white" name="visit-city"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Nazione</span><input required="required" id="visit-country" class="visits-information border-white" name="visit-country"></input>
						</div>
					</div>
		        	<!-- <div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="fullname" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Nome e Cognome</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="fullname" name="fullname">
					    </div>
					    <div class="col-sm-2"></div>
					</div>
					<div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="phone" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Telefono</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="phone" name="phone">
					    </div>
					    <div class="col-sm-2"></div>
					</div>
					<div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="email" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Email</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="email" name="email">
					    </div>
					    <div class="col-sm-2"></div>
					</div>
					<div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="numPeople" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Numero di persone (max 20)</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="numPeople" name="numPeople">
					    </div>
					    <div class="col-sm-2"></div>
					</div>
					<div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="city" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Città di provenienza</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="city" name="city">
					    </div>
					    <div class="col-sm-2"></div>
					</div>
					<div class="form-group row mt-5 fg-f-size-normal no-gutters">
		        		<div class="col-sm-2"></div>
		        		<label for="country" class="col-sm-4 col-form-label text-sm-right pt-0 pb-0 pr-2">Nazione</label>
					    <div class="col-sm-4">
					      <input class="visits-information" id="country" name="country">
					    </div>
					    <div class="col-sm-2"></div>
					</div> -->
		        	<div class="row">
		        		<div class="mx-auto mt-3 mt-md-3 mt-xl-4 fg-f-size-small">
		        			<div class="form-check-inline">
							  <label class="form-check-label">
							    <input id="#visits-checkin-privacy" required="required" type="checkbox" class="form-check-input" value="">Accetto le condizioni della privacy
							  </label>
							</div>
		        		</div>
		        	</div>
		        	<!-- <div class="col-sm-4 mx-auto" id="thankyou-visit-msg">
                        <div class="inside-thankyou-visit-msg">
                      		Thank you. You will be contacted soon!
                      	</div>
                    </div> -->
		        	<div class="row">
		        		<div class="mx-auto mt-3 mt-md-3 mt-xl-4">
		        			<button class="btn btn-primary btn-visits" type="submit"><?php pll_e('sendRequest_str'); ?></button>
		        			<div id="visits-checkin-missing-msg">You must select a checkin date</div>
		        		</div>
		        	</div>
					
		            
		        </div> 
			</div>
		</div>
		</form>			
	</div> 
</section>




<?php get_footer(); ?>