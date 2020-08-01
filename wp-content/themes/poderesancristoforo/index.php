<?php get_header(); ?>

<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published'
		
	);

	$arr_posts = new WP_Query($args);

	$i = 0;

	echo ($i);
	if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		<section id="visite" class="psc-section">
			<div class="container-fluid">
			    <div class="row equal">
		            <div class="col-md-12 col-lg-7 px-0 order-lg-1 order-first d-flex overflow-hidden">
		            	<?php
		            	if ( get_the_post_thumbnail(get_the_id()) != '' ) {
							the_post_thumbnail(array('class' => 'd-flex align-items-center'));
						} else {

							
							echo '<img src="';
							echo catch_that_image();
							echo '" alt="" class="d-flex align-items-center"/>';

						}
		                //<img class="d-flex align-items-center" src="<?php echo $image[0]; ?> <!--">-->
		            </div>
		            <?php 
		            	if ($i%2 == 0) {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-grey overflow-hidden'>";
		            		echo "<div class='psc-article w-100 bg-grey'>";
		            	} else {
		            		echo "<div class='col-md-12 col-lg-5 px-0 order-lg-12 order-last bg-white fg-black overflow-hidden'>";
		            		echo "<div class='psc-article w-100 bg-white fg-black'>";
		            	}
		            	echo the_content();
		            ?>
		                  
		                </div>

		            </div>
		        </div>  
			</div> 
		</section>
		<?php $i++; ?>
	<?php

	endwhile; endif;
?>

<?php get_footer(); ?>