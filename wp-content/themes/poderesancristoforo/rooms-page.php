<?php
/**
* Template Name: Rooms Custom Page
*/


get_header(); ?>
<!-- <?php //get_template_part('simple-page-lander'); ?> -->

<section id="rooms" class="psc-section">
	<div class="container-fluid">

<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published',
		'category_name' => 'rooms'
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
							echo '" alt="" class="align-items-center"/>';

						}
		                //<img class="d-flex align-items-center" src="<?php echo $image[0]; ?> <!--">-->
		            </div>
		            <?php 
		            	if ($i%2 == 0) {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey overflow-hidden d-flex align-items-center'>";
		            		echo "<div class='psc-article w-100 bg-grey'>";
		            	} else {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white fg-black overflow-hidden d-flex align-items-center'>";
		            		echo "<div class='psc-article w-100 bg-white fg-black my-auto'>";
		            	}
		            	echo the_content();
		            ?>
		                  
		                </div>
		            </div>
		        </div>  
			
		<?php $i++; ?>
	<?php
		/*if (strtolower(get_the_title()) == 'vino') : get_template_part('section_vino');  endif;
		if (strtolower(get_the_title()) == 'luminoso') : get_template_part('section_luminoso');  endif;
		if (strtolower(get_the_title()) == 'amaranto') : get_template_part('section_amaranto');  endif;
		if (strtolower(get_the_title()) == 'carandelle') : get_template_part('section_carandelle');  endif;*/

	endwhile; endif;
?>

    	<form action="" method="post" id="reservation-send">
	        <div class="row equal">
	            <div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
	                <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/apartment_livingroom.jpg">
	            </div> 
	            <div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey d-flex align-items-center">               
	                    <div class="psc-article w-100 bg-grey fg-white ">
	                    	<h2><?php pll_e('booking_checkin_str'); ?></h2>
	                    	<h3><?php pll_e('customerContact_str'); ?></h3>
	                    	
	                    	<div class="row">
	                    		<input type="text" hidden="hidden" name="checkin" id="checkin">
	                    		<div id="checkin-calendar" class="mx-auto mt-3">
	                    			
	                    		</div>
	                    	</div>

	                    	<h3 class="mt-3"><?php pll_e('arrivalDate_str'); ?><span id="arrival-day" class="ml-2"></span> /<span id="arrival-month"></span> /<span id="arrival-year"></span></h3>
	                        
	                    </div> 
	            </div>
	            
	            
	        </div>  
	    
	        <div class="row equal">
	            <div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
	                <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/ghiaie.jpg">
	            </div> 
	            <div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white d-flex align-items-center">               
	                    <div class="psc-article w-100 bg-white fg-black ">
	                    	<h2><?php pll_e('booking_checkout_str'); ?></h2>

	                        <div class="row">
	                        	<input type="text" hidden="hidden" name="checkout" id="checkout">
	                    		<div id="checkout-calendar" class="mx-auto mt-2">
	                    			
	                    		</div>
	                    	</div>

	                    	<h3 class="mt-3"><?php pll_e('leavingDate_str'); ?><span id="leaving-day" class="ml-2"></span> /<span id="leaving-month"></span> /<span id="leaving-year"></span></h3>

	                    	<div class="row">
	                    		<div class="col-12 col-md-6 mt-3 mt-md-4 d-flex justify-content-center justify-content-md-end">
	                    			<div>
	                    				<span class="total-nights"><?php pll_e('numNights_str'); ?></span><span id="total-nights" class="border"></span>
	                    			</div>
	                    		</div>
	                    		<div class="col-12 col-md-6 mt-3 mt-md-4 d-flex justify-content-center justify-content-md-start">
	                    			<div>
	                    				<span class="total-cost"><?php pll_e('totalCost_str'); ?></span><span id="total-cost" class="border"></span>
	                    			</div>
	                    		</div>
                    		</div>
	                    </div> 
	            </div>
	            
	            
	        </div>

	        <div class="row equal">
			<div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
			    <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/girasole.jpg">
			</div> 
			<div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey d-flex align-items-center">               
		        <div class="psc-article w-100 bg-grey fg-white ">
		        	<h2><?php pll_e('registration_str'); ?></h2>
		        	<h3><?php pll_e('yourData_str'); ?></h3>
		        	<div class="row">
						<div class="mx-auto mt-5 fg-f-size-small">
							<span class="mr-2 visits-span-label">Nome</span><input id="name" class="visits-information book-room-input" name="name" required="required"></input> 
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Nazionalità</span><input id="nationality" class="visits-information book-room-input" name="nationality" required="required"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Telefono</span><input id="phone" class="visits-information book-room-input" name="phone" required="required"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Email</span><input id="email" class="visits-information book-room-input" name="email" required="required"></input>
						</div>
					</div>
					<div class="row">
						<div class="mx-auto mt-4 fg-f-size-small">
							<span class="mr-2 visits-span-label">Nr di persone (max 8)</span><input id="numPeople" class="visits-information book-room-input" name="numPeople" required="required"></input>
						</div>
					</div>
		        </div> 
			</div>
		</div>
	   
	        <div class="row equal">
	            <div class="col-md-12 col-lg-7 px-0 order-lg-11 order-first mimi-img overflow-hidden">
	                <img class="align-items-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/carandelle.jpg">
	            </div> 
	            <div class="col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white d-flex flex-column justify-content-center">               
	                    <div class="psc-article w-100 bg-white fg-black">
	                    	<h2><?php pll_e('notes_str'); ?></h2>
	                    	<h3><?php pll_e('questionNotes_str'); ?></h3>
	                        <!-- <p>Ti preghiamo di dirci più cose su di te, sul tuo ipotetico orario di arrivo e di partenza, o farci delle domande per qualsiasi dubbio o richiesta.</p> -->
	                    </div> 
	                    <div class="text-area-container mx-auto mt-2">
							<textarea class="" id="textarea-additional-notes" name="textarea-additional-notes" rows="8" placeholder="Scrivi qui per eventuali richieste o informarci del tuo orario di arrivo e di partenza"></textarea>
						</div>
						<input type="hidden" id="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>"/>
						 <div class="col-sm-6" id="warning-msg">
                            <div class="inside-warning-msg">
                          		Mail Sent
                          	</div>
                        </div>
                       	<button class="btn btn-primary btn-rooms mt-xl-4 mt-lg-2 mt-4 mb-2 mx-auto" type="submit"><?php pll_e('sendRequest_str'); ?></button>
						
						
					
	            </div>
	            
	            
	        </div> 
	    
    	</form> 
    </div>
</section>

<?php get_footer(); ?>