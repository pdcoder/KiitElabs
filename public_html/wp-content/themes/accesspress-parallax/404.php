<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package accesspress_parallax
 */

get_header(); ?>
<div class="container">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'accesspress-parallax' ); ?></h1>
		</header><!-- .page-header -->

		
	</section><!-- .error-404 -->
</div>

<?php get_footer(); ?>

<style>
	
	.bottom-footer{
		position: fixed;
		bottom: 0;
		width: 100%;
	}
	
</style>