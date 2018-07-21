<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package accesspress_parallax
 */


get_header(); ?>

<?php 
if(of_get_option('enable_parallax') == 1 && is_front_page() && get_option( 'show_on_front' ) == 'page'){
	get_template_part('index','parallax');
}else{
?>

<div class="container">

	<?php
    if (have_posts()):

      while (have_posts()): the_post(); ?>

		<h1  style="color: #E66432;"><?php the_title(); ?></h1>

			<?php the_content(); ?>

			<?php
		endwhile;

	endif; ?>

</div>

<?php } ?>

<?php get_footer();
