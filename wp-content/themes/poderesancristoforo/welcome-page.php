<?php
/**
* Template Name: Welcome Custom Page
*/


get_header(); ?>

<section id="welcome" class="psc-section">
	<div class="container-fluid">

<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published',
		'category_name' => 'welcome'
	);

	$arr_posts = new WP_Query($args);

	// i = 1 because they wan to staert from white
	$i = 1;

	if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		
			    <div class="row equal" id="<?php the_title(); ?>">
		            <div class="col-md-12 col-lg-7 px-0 order-lg-1 order-first mimi-img overflow-hidden">
		            	<?php
		            	if ( get_the_post_thumbnail(get_the_id()) != '' ) {
							the_post_thumbnail(array('class' => 'align-items-center'));
						} else {

							
							echo '<img src="';
							echo catch_that_image();
							echo '" alt="" class="align-items-center"/>';

						}
						if (has_tag('welcome')) { ?>
							<div class="landing-logo">
        						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/LOGO_PSC_Calligraphy_transparent.svg">
        					</div>
        				<?php
		                }
		                ?>
		                
		            </div>
		            <?php 
		            	if ($i%2 == 0) {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey overflow-hidden d-flex'>";
		            		echo "<div class='psc-article w-100 bg-grey my-auto'>";
		            	} else {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white fg-black overflow-hidden d-flex'>";
		            		echo "<div class='psc-article w-100 bg-white fg-black my-auto'>";
		            	}
		            	echo the_content();

		            	if (has_tag('welcome')) { ?>
		            		<div class="row">
		            				
		            			
    <style type="text/css">
    @import url(https://t81adcc4c.emailsys2a.net/css/main/v2/form.css);

    
    </style>
    <form action="https://t81adcc4c.emailsys2a.net/23/3893/79652ec806/subscribe/form.html" method="post" class="mx-auto">
        <div class="form">
            <div class="form_border">
                <ul>
                    <li style="position:absolute; z-index: -100; left:-6000px;" aria-hidden="true">
                        <label class="field_label required" for="rm_email">email: </label>
                        <input type="text" class="form_field" name="rm_email" id="rm_email" value="" tabindex="-1" />
                        <label class="field_label required" for="rm_comment">Comment: </label>
                        <textarea class="form_field" name="rm_comment" tabindex="-1" id="rm_comment"></textarea>
                    </li>
                    <li>
                        <label class="field_label required" for="email">email: </label>
                        <input type="text" class="form_field" name="email" id="email" value="" />
                    </li>
                    <li id="firstname_form">
                        <label id="firstname_label" class="field_label" for="firstname">Nome: </label>
                        <input type="text" class="form_field" name="firstname" id="firstname" value="" />
                    </li>
                    <li id="lastname_form">
                        <label id="lastname_label" class="field_label" for="lastname">Cognome: </label>
                        <input type="text" class="form_field" name="lastname" id="lastname" value="" />
                    </li>
                    <li>
                        <label id="gender_label" class="field_label" for="gender">Uomo o donna?: </label>
                        <input type="radio" id="gender_female" name="gender" value="female" /> <label for="gender_female">donna</label>
                        <input type="radio" id="gender_male" name="gender" value="male" /> <label for="gender_male">uomo</label>
                    </li>
                    <li id="extra6_form">
                        <label id="extra6_label" class="field_label" for="extra6">Lingua: </label>
                        <input type="text" class="form_field" name="extra6" id="extra6" value="" />
                    </li>
                    <li class="form_button">
                        <input type="submit" class="form_button_submit" value="Iscriviti" />
                    </li>
                </ul>
            </div>
        </div>
    </form>





								<div class="col-sm-4 mx-auto" id="thankyou-msg">
	                            <div class="inside-thankyou-msg">
	                          		Thank you.
	                          	</div>
	                        </div>
							</div>
			        		
							

							<div class='col-md-12 px-0 order-lg-12 order-last bg-white fg-black overflow-hidden'>
								<div id="mimi-box-specs" class='psc-article w-100 bg-white fg-black'>
									<p>La tua iscrizione è un premio al nostro lavoro ed un segno importante di preferenza per i nostri vini. Nella nostra newsletter troverai, oltre ai racconti legati alla bellezza naturale di Podere San Cristoforo, anche offerte e privilegi esclusivi. Privacy Policy</p>
								</div>
							</div>
						<?php 
						}
		            	?>
		                  
		                </div>

		            </div>
		        </div>  
			
		<?php $i++; ?>
	<?php

	endwhile; endif;
?>

	</div> 
</section>


<?php get_footer(); ?>