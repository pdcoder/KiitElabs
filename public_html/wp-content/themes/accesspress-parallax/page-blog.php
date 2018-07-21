<?php

/*
Template Name: Blog Page
*/


get_header(); ?>

<?php 
if(of_get_option('enable_parallax') == 1 && is_front_page() && get_option( 'show_on_front' ) == 'page'){
	get_template_part('index','parallax');
}else{
?>


<div class="container">

	<br>
	<h2  style="color: #E66432;"><?php echo get_the_title(); ?></h2>

	<?php 
  if (isset($_SESSION['elabs-roll-number'])){
    $roll = $_SESSION['elabs-roll-number'];
    global $wpdb;
    $result = $wpdb->get_row("SELECT * FROM user_list WHERE roll = $roll");
    if ($result->course1 === "None"){
      $args = array('post_type' => 'post', 'cat' => get_cat_ID('Blogs General'));
    }
    else{
      $args = array('post_type' => 'post', 'cat' => array(get_cat_ID('Blogs General'), get_cat_ID('Blog '.$result->course1)));
    }
  }else{
  	$args = array('post_type' => 'post', 'cat' => get_cat_ID('Blogs General'));
  }
    $loop = new WP_Query($args);

    if ($loop -> have_posts()):

      	while ($loop -> have_posts()): $loop -> the_post(); ?>

      	<div class="row" id="posts" style="padding: 2vmin;">

      		<a href="<?php echo get_the_permalink(); ?>"><h5 style="color: black; text-decoration: none;"><?php echo get_the_title(); ?></h5></a>
      		<hr>

      		<?php 
      		if (has_post_thumbnail()){ ?>

      		<div class="col-xs-12 col-sm-4">

      			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" style="width: 100%; height: auto; vertical-align: middle;">

      		</div>

      		<div class="col-xs-12 col-sm-8">

      			<?php }else{ ?>

      		<div class="col-xs-12">

      			<?php } ?>

      			<span style="color: rgba(0, 0, 0, 0.75); font-size: 120%;"><?php the_content(); ?></span>

      		</div>

      	</div>

		<?php endwhile;
	endif; ?>


</div>
<?php } ?>

<br><br>

<?php get_footer();
