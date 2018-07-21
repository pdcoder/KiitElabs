<?php

/*
Template Name: Notices Page
*/


get_header(); ?>


<div class="container">

<br>
<h2  style="color: #E66432;"><?php echo get_the_title(); ?></h2>



<?php 
$args = array('post_type' => 'post', 'cat' => get_cat_ID('Notices'));
$loop = new WP_Query($args);

if ($loop->have_posts()):
	while ($loop->have_posts()): $loop->the_post(); ?>

	<div class="row" style="box-shadow: 0 0 2vmin #ddd; padding-left: 2vmin; padding-right: 2vmin; width: 100%; margin: auto;">

		<h3><?php echo get_the_title(); ?></h3>

		<p style="font-size: 120%"><?php echo get_the_content(); ?></p> 

	</div>

	<hr>

	<?php 
	endwhile;
endif;
?>
</div>

<?php get_footer(); ?>