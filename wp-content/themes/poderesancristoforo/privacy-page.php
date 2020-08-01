<?php
/**
* Template Name: Privacy Custom Page
*/


get_header(); ?>
<!-- <?php //get_template_part('simple-page-lander'); ?> -->

<section id="privacy" class="psc-section">
	<div class="container-fluid">

<?php
	$args = array(
		'post_type' => 'post',
		'post_status' => 'published',
		'category_name' => 'privacy'
	);

	$arr_posts = new WP_Query($args);

	$i = 0;

	if ( $arr_posts->have_posts() ) : while ( $arr_posts->have_posts() ) : $arr_posts->the_post(); ?>
		
			    <div class="row equal">
		            <div class="col-sm-12 px-0">
		            	<div class='psc-article w-100 bg-grey pt-8'>
		            		<?php 
		            			echo the_content();
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