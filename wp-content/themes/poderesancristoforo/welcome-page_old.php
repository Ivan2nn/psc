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
		            			<form action="" method="post" id="leave-contact-send">
			            			<div class="mimi-box mt-sm-2 mt-md-4">
										<div class='col-md-10 col-sm-10 mx-auto text-center'>
											<p class="text-center">RESTA IN CONTATTO CON NOI</p>
										</div>
										<div class="row">
											<input type="hidden" id="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>"/>
										<div class="col-md-8 col-sm-12"><input type="email" required="required" class='mimi-box-input' placeholder="Email" name="contact-email" id="contact-email"></div>
										<div class="col-md-4 col-sm-12 text-center text-md-right mt-2 mt-md-0"><button disabled="disabled" id="request-contact" class="btn btn-primary btn-mimibox" type="submit"><?php pll_e('askContact_str'); ?></button></div>
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
									<p>Ti promettiamo di non disturbarti con newsletter periodiche, ti informeremo solo delle novità più importanti e ti regaleremo subito uno sconto del 10% per i tuoi acquisti online. Privacy Policy</p>
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