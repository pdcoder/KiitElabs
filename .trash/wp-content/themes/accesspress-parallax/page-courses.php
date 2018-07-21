<?php
/**
 * The template for displaying course pages.
 *
 *
 * @package accesspress_parallax
 */

/*
Template Name: Courses Page
*/


get_header(); ?>

<br>
<div class="row">
<div class="col-xs-10 col-xs-offset-1" style="background-color: white; border: 1px solid #ddd; box-shadow: 0 0 2px #ddd">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif; ?>


</div>
</div>

<br>
<center>
<h1 style="color: #E66432;">Course Instructors</h1>

<?php 
    $args = array('post_type' => 'post', 'cat' => get_cat_ID('Team '.get_the_title()));
    $loop = new WP_Query($args);

    if ($loop -> have_posts()): ?>
    <div class="row">
      <?php while ($loop -> have_posts()): $loop -> the_post(); ?>

      
        <div class="col-xs-6 col-sm-4 col-md-3" style="display: inline-block; padding: 2vmin; vertical-align: top;">
        
          <center>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" style="height: auto; width: 70%; border-radius: 50%;">
            <br>

            <p style="font-size: 140%; word-wrap: break-word;"><?php the_title(); ?></p>

            
          </center>
        </div>

      <?php endwhile; 
    endif;

    wp_reset_postdata();
?>

</div>

<div id="course-structure" style="text-align: left;box-shadow: 0 0 2vmin #ccc; margin-left: 2vw; margin-right: 2vw; width: 96vw; padding: 2vmin">

  <?php

  $args = array('post_type' => 'post', 'cat' => get_cat_ID('Course Structure'));
    $loop = new WP_Query($args);

    if ($loop -> have_posts()):

      while ($loop -> have_posts()): $loop -> the_post();

        if ("Course Structure ".trim(wp_title(' ', false)) == get_the_title()){ ?>

          <h4 style="color: #E66432;">Course Content</h4>

          <h6 style="line-height: 170%;"><?php echo get_the_content(); ?></h6>

          <?php

        }

      endwhile;

    endif;


  ?> 

</div>
<br>
</center>



<?php get_footer();
