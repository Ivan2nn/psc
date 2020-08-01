<?php
/**
* Template Name: Vini Custom Page
*/


get_header(); ?>
<!-- <?php //get_template_part('simple-page-lander'); ?> -->

<section id="vigneto" class="psc-section">
	<div class="container-fluid">
<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published',
		'category_name' => 'wines'
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
		                <?php 
		                	if (has_tag('limited')) {
		                		if ($i%2 == 0) {
		                			echo '<div class="corner-ribbon top-right sticky grey fg-black"><div class="limited">LIMITED <br>
		                			EDITION</div></div>';  
		                		} else {
		                			echo '<div class="corner-ribbon top-right sticky dark"><div class="limited">LIMITED <br>
		                			EDITION</div></div>'; 
		                		}
		                	}
		                	?>
		            </div>
		        </div>  
			
		<?php $i++; ?>
	<?php

	endwhile; endif;
?>

	</div> 
</section>

<?php get_footer(); ?>