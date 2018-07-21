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


get_header();
$page_title = $wp_query->post->post_title;
?>

<br/>
<div class="row">
  <div class="col-xs-12  col-sm-10 col-sm-offset-1" style="background-color: white; border: 1px solid #ddd; box-shadow: 0 0 2px #ddd">
    <center>
      <div style="height: auto; width:100%; background-color: rgb(250, 250, 250); margin: 0;padding: 1vmin 2vmax; ">
        <h1><?php echo $page_title; ?> Course</h1>
      </div>
    </center>
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <?php 
        if (have_posts()):
          while (have_posts()): the_post(); ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Course Image" style="height:auto; width: 100vw;">
          </div>
          <div class="col-xs-12 col-sm-4" style="padding: 5vmin 2vmax">
            <?php the_content(); ?>
          <?php endwhile;
        endif; ?>
      </div>
    </div>
  </div>
</div>

<br/>
<center>
<h2 style="color: #E66432;">Course Instructors</h2>

<?php 
    $args = array('post_type' => 'members', 'orderby' => 'date', 'order' => 'ASC');
    $loop = new WP_Query($args);

    if ($loop -> have_posts()): ?>
    <div class="row" id="course-instructors">
      <?php while ($loop -> have_posts()): $loop -> the_post();
        if (get_post_meta(get_the_ID(), 'Subject', true) == $page_title){
      ?>

        <div class="col-xs-6 col-sm-4 col-md-3">
        
          <center>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" style="height: auto; width: 70%; border-radius: 50%;">
            <br>

            <h4 style="word-wrap: break-word;"><?php the_title(); ?></h4>

          </center>
        </div>

      <?php
        }
       endwhile; 
    endif;

    wp_reset_postdata();
?>

</div>

<div id="course-structure">

  <?php

  $args = array('post_type' => 'course-structure');
    $loop = new WP_Query($args);

    if ($loop -> have_posts()):

      while ($loop -> have_posts()): $loop -> the_post();

        if ($page_title == get_the_title()){ ?>

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
