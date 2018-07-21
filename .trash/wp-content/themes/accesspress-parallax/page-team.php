<?php


/*
Template Name: Team Page
*/


get_header(); ?>

<?php

$array = array();

$args = array('post_type' => 'post', 'cat' => get_cat_ID('Team'));

  $loop = new WP_Query($args);

  if ($loop -> have_posts()):

    while ($loop -> have_posts()): $loop -> the_post();

      $item = array(get_the_title(), get_the_post_thumbnail_url(), get_post_meta(get_the_ID(), 'Facebook Id', true), get_post_meta(get_the_ID(), 'Linkedin Id', true), get_post_meta(get_the_ID(), 'Github Id', true), get_post_meta(get_the_ID(), 'Gmail Id', true), get_post_meta(get_the_ID(), 'Team', true));

      $array[] = $item;

    endwhile;

  endif;    

  $count4 = 0;
  $count3 = 0;
  $count2 = 0;
  $count1 = 0;
  $count0 = 0;


  foreach($array as $a){
      if ($a[6]==='4')
          $count4++;
      else if ($a[6]==='3')
          $count3++;
      else if ($a[6]==='2')
          $count2++;
      else if ($a[6]==='1')
          $count1++;
      else if ($a[6]==='0')
          $count0++;
  }

  ?>

  <center>
    <div id="button_div">
  <div style="display: inline-block; width: 45vw;margin: 0; padding-top: 10vh; padding-bottom: 5vh; padding-left: 0; padding-right: 0">

    <button class="btn btn-block" id="button_team" style="background-color: rgba(250, 250, 250, 0.7); color: #e66432;width: 40vw; border: 2px solid #E66432; padding-bottom: 5vmin; padding-top: 5vmin; padding-left: 0; padding-right: 0; line-height: 0;" onclick="var team = document.getElementById('team'); var alumni = document.getElementById('alumni'); var button_team = document.getElementById('button_team'); var button_alumni = document.getElementById('button_alumni'); team.style.display='block'; alumni.style.display='none';button_alumni.style.backgroundColor = 'rgba(250, 250, 250, 0.7)'; button_alumni.style.color = '#E66432'; button_team.style.backgroundColor = '#E66432'; button_team.style.color = 'white';  "><h6 style="margin: 0; line-height: 0; padding: 0">The Team</h6></button>

  </div>

  <div style="display: inline-block; width: 45vw; margin:0; padding-top: 10vh; padding-bottom: 5vh;  padding-left: 0; padding-right: 0">

    <button class="btn btn-block" id="button_alumni" style="background-color: rgba(250, 250, 250, 0.7); color: #e66432; width: 40vw; border: 2px solid #E66432; padding-bottom: 5vmin; padding-top: 5vmin; padding-left: 0; padding-right: 0; line-height: 0;" onclick="var team = document.getElementById('team'); var alumni = document.getElementById('alumni'); var button_team = document.getElementById('button_team'); var button_alumni = document.getElementById('button_alumni'); team.style.display='none'; alumni.style.display='block'; button_team.style.backgroundColor = 'rgba(250, 250, 250, 0.7)'; button_team.style.color = '#E66432'; button_alumni.style.backgroundColor = '#E66432'; button_alumni.style.color = 'white';"><h6 style="margin: 0; line-height: 0; padding: 0">The Alumni</h6></button>

  </div>
</div>




  <div style="display: none;" id="team">        

        <?php
        $count = 0;
        
        $mod4 = $count4/4 + 1;
        $mod3 = $count3/4 + 1;
        $mod2 = $count2/4 + 1;
        $mod1 = $count1/4 + 1;
        $mod0 = $count0/4 + 1;
        
        if ($count4!=0){ ?>
            <div id='year4' style='background-color: white;width: 97vw;margin-left: 0.5vw;border: none;box-shadow: 0 0 3px 0.3px #aaa;margin-bottom: 5vh;padding-top: 1vh;'>
            <h2 style='font-weight: 500;padding-left: 10vw;padding-bottom: 1vmin;float: left;font-size: 4.5vmin;font-family: "Roboto Slab", serif;margin-left: 6vmax;'>The Einsteins'</h2>
            
            <div id="myCarousel4" class="carousel slide" data-ride="carousel" style="padding-top: 2vh; ">
                            
            <div class="carousel-inner" style="width: 90vw; ">
            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='4'){
                    if ($i%4===0 && $i===0){ ?>
                        <div class="item active">
                    <?php
                    }
                    else if ($i%4===0){ ?>
                        </div>
                        <div class='item'>
                    <?php } ?>
                    <div id="memberimages" style="height: 25vmax;margin-left: 1.25vw;margin-right: 1.25vw;padding-bottom: 2vh;padding: 0;display: inline-block;">
                    
                    <div id="content-members">
                    <div id="layer">
                    <center><?php if($a[2]!== ''){ ?><a href=' <?php echo $a[2]; ?>'><img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'></a><?php }if ($a[3]!== ''){ ?>  <a href=' <?php echo $a[3]; ?>'><img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'></a> <?php } ?></center>
                    <center><?php if($a[4]!== ''){ ?><a href=' <?php echo $a[4]; ?>'><img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'></a> <?php }if ($a[5]!== ''){ ?> <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'><img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'></a> <?php } ?></center>
                    </div>
                    <img src=' <?php echo $a[1]; ?>' alt='.$a[0].' style='height:17.5vmax;width: 17.5vmax;'>
                    <h3 style='font-size: 3vmin;font-family: "Roboto Slab", serif; text-align: center;'> <?php echo $a[0]; ?></h3>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            </div>
            </div>
            
            <a class="left carousel-control" href="#myCarousel4" data-slide="prev" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
            <span class="sr-only">Previous</span>
            </a>';
            
            <a class="right carousel-control" href="#myCarousel4" data-slide="next" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
            <span class="sr-only">Next</span>
            </a>
            
            </div>
            </div>
        <?php } 

        if ($count3!=0){ ?>
            <div id='year4' style='background-color: white;width: 97vw;margin-left: 0.5vw;border: none;box-shadow: 0 0 3px 0.3px #aaa;margin-bottom: 5vh;padding-top: 1vh;'>
            <h2 style='font-weight: 500;padding-left: 10vw;padding-bottom: 1vmin;float: left;font-size: 4.5vmin;font-family: "Roboto Slab", serif;margin-left: 6vmax;'>The Tesla'</h2>
            
            <div id="myCarousel3" class="carousel slide" data-ride="carousel" style="padding-top: 2vh; ">
                            
            <div class="carousel-inner" style="width: 90vw; ">
            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='3'){
                    if ($i%4===0 && $i===0){ ?>
                        <div class="item active">
                    <?php
                    }
                    else if ($i%4===0){ ?>
                        </div>
                        <div class='item'>
                    <?php } ?>
                    <div id="memberimages" style="height: 25vmax;margin-left: 1.25vw;margin-right: 1.25vw;padding-bottom: 2vh;padding: 0;display: inline-block;">
                    
                    <div id="content-members">
                    <div id="layer">
                    <center><?php if($a[2]!== ''){ ?><a href=' <?php echo $a[2]; ?>'><img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'></a><?php }if ($a[3]!== ''){ ?>  <a href=' <?php echo $a[3]; ?>'><img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'></a> <?php } ?></center>
                    <center><?php if($a[4]!== ''){ ?><a href=' <?php echo $a[4]; ?>'><img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'></a> <?php }if ($a[5]!== ''){ ?> <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'><img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'></a> <?php } ?></center>
                    </div>
                    <img src=' <?php echo $a[1]; ?>' alt='.$a[0].' style='height:17.5vmax;width: 17.5vmax;'>
                    <h3 style='font-size: 3vmin;font-family: "Roboto Slab", serif; text-align: center;'> <?php echo $a[0]; ?></h3>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            </div>
            </div>
            
            <a class="left carousel-control" href="#myCarousel3" data-slide="prev" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
            <span class="sr-only">Previous</span>
            </a>';
            
            <a class="right carousel-control" href="#myCarousel3" data-slide="next" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
            <span class="sr-only">Next</span>
            </a>
            
            </div>
            </div>
        <?php } 
        
        if ($count2!=0){ ?>
            <div id='year2' style='background-color: white;width: 97vw;margin-left: 0.5vw;border: none;box-shadow: 0 0 3px 0.3px #aaa;margin-bottom: 5vh;padding-top: 1vh;'>
            <h2 style='font-weight: 500;padding-left: 10vw;padding-bottom: 1vmin;float: left;font-size: 4.5vmin;font-family: "Roboto Slab", serif;margin-left: 6vmax;'>The Schrodingers'</h2>
            
            <div id="myCarousel2" class="carousel slide" data-ride="carousel" style="padding-top: 2vh; ">
                            
            <div class="carousel-inner" style="width: 90vw; ">
            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='2'){
                    if ($i%4===0 && $i===0){ ?>
                        <div class="item active">
                    <?php
                    }
                    else if ($i%4===0){ ?>
                        </div>
                        <div class='item'>
                    <?php } ?>
                    <div id="memberimages" style="height: 25vmax;margin-left: 1.25vw;margin-right: 1.25vw;padding-bottom: 2vh;padding: 0;display: inline-block;">
                    
                    <div id="content-members">
                    <div id="layer">
                    <center><?php if($a[2]!== ''){ ?><a href=' <?php echo $a[2]; ?>'><img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'></a><?php }if ($a[3]!== ''){ ?>  <a href=' <?php echo $a[3]; ?>'><img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'></a> <?php } ?></center>
                    <center><?php if($a[4]!== ''){ ?><a href=' <?php echo $a[4]; ?>'><img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'></a> <?php }if ($a[5]!== ''){ ?> <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'><img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'></a> <?php } ?></center>
                    </div>
                    <img src=' <?php echo $a[1]; ?>' alt='.$a[0].' style='height:17.5vmax;width: 17.5vmax;'>
                    <h3 style='font-size: 3vmin;font-family: "Roboto Slab", serif; text-align: center;'> <?php echo $a[0]; ?></h3>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            </div>
            </div>
            
            <a class="left carousel-control" href="#myCarousel2" data-slide="prev" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
            <span class="sr-only">Previous</span>
            </a>';
            
            <a class="right carousel-control" href="#myCarousel2" data-slide="next" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
            <span class="sr-only">Next</span>
            </a>
            
            </div>
            </div>
        <?php } 
       
        if ($count1!=0){ ?>
            <div id='year1' style='background-color: white;width: 97vw;margin-left: 0.5vw;border: none;box-shadow: 0 0 3px 0.3px #aaa;margin-bottom: 5vh;padding-top: 1vh;'>
            <h2 style='font-weight: 500;padding-left: 10vw;padding-bottom: 1vmin;float: left;font-size: 4.5vmin;font-family: "Roboto Slab", serif;margin-left: 6vmax;'>The Hawkings'</h2>
            
            <div id="myCarousel1" class="carousel slide" data-ride="carousel" style="padding-top: 2vh; ">
                            
            <div class="carousel-inner" style="width: 90vw; ">
            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='1'){
                    if ($i%4===0 && $i===0){ ?>
                        <div class="item active">
                    <?php
                    }
                    else if ($i%4===0){ ?>
                        </div>
                        <div class='item'>
                    <?php } ?>
                    <div id="memberimages" style="height: 25vmax;margin-left: 1.25vw;margin-right: 1.25vw;padding-bottom: 2vh;padding: 0;display: inline-block;">
                    
                    <div id="content-members">
                    <div id="layer">
                    <center><?php if($a[2]!== ''){ ?><a href=' <?php echo $a[2]; ?>'><img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'></a><?php }if ($a[3]!== ''){ ?>  <a href=' <?php echo $a[3]; ?>'><img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'></a> <?php } ?></center>
                    <center><?php if($a[4]!== ''){ ?><a href=' <?php echo $a[4]; ?>'><img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'></a> <?php }if ($a[5]!== ''){ ?> <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'><img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'></a> <?php } ?></center>
                    </div>
                    <img src=' <?php echo $a[1]; ?>' alt='.$a[0].' style='height:17.5vmax;width: 17.5vmax;'>
                    <h3 style='font-size: 3vmin;font-family: "Roboto Slab", serif; text-align: center;'> <?php echo $a[0]; ?></h3>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            </div>
            </div>
            
            <a class="left carousel-control" href="#myCarousel1" data-slide="prev" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
            <span class="sr-only">Previous</span>
            </a>';
            
            <a class="right carousel-control" href="#myCarousel1" data-slide="next" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
            <span class="sr-only">Next</span>
            </a>
            
            </div>
            </div>
        <?php } ?>

      </div>

      <div style="display: none;" id="alumni">
        

        <?php if ($count0!=0){ ?>

            <div id='alumni' style='background-color: white;width: 97vw;margin-left: 0.5vw;border: none;box-shadow: 0 0 3px 0.3px #aaa;margin-bottom: 5vh;padding-top: 1vh;'>

              <h2 style='font-weight: 500;padding-left: 10vw;padding-bottom: 1vmin;float: left;font-size: 4.5vmin;font-family: "Roboto Slab", serif;margin-left: 6vmax;'>The Darwins'</h2>
            
            <div id="myCarousel0" class="carousel slide" data-ride="carousel" style="padding-top: 2vh; ">
                            
            <div class="carousel-inner" style="width: 90vw; ">
            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='0'){
                    if ($i%4===0 && $i===0){ ?>
                        <div class="item active">
                    <?php
                    }
                    else if ($i%4===0){ ?>
                        </div>
                        <div class='item'>
                    <?php } ?>
                    <div id="memberimages" style="height: 25vmax;margin-left: 1.25vw;margin-right: 1.25vw;padding-bottom: 2vh;padding: 0;display: inline-block;">
                    
                    <div id="content-members">
                    <div id="layer">
                    <center><?php if($a[2]!== ''){ ?><a href=' <?php echo $a[2]; ?>'><img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'></a><?php }if ($a[3]!== ''){ ?>  <a href=' <?php echo $a[3]; ?>'><img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'></a> <?php } ?></center>
                    <center><?php if($a[4]!== ''){ ?><a href=' <?php echo $a[4]; ?>'><img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'></a> <?php }if ($a[5]!== ''){ ?> <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'><img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'></a> <?php } ?></center> 
                    </div>
                    <img src=' <?php echo $a[1]; ?>' alt='.$a[0].' style='height:17.5vmax;width: 17.5vmax;'>
                    <h3 style='font-size: 3vmin;font-family: "Roboto Slab", serif; text-align: center;'> <?php echo $a[0]; ?></h3>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            </div>
            </div>
            
            <a class="left carousel-control" href="#myCarousel0" data-slide="prev" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
            <span class="sr-only">Previous</span>
            </a>';
            
            <a class="right carousel-control" href="#myCarousel0" data-slide="next" style="vertical-align: middle;background-image: none;height: 30vmax;margin-top: 1vmax;margin-left: 0.5vmax;margin-right: 0.5vmax;width: 4vmax;">
            <span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
            <span class="sr-only">Next</span>
            </a>
            
            </div>
            </div>
        <?php } ?>

      </div>

    </center>
    <br><br><br>
      
    

<?php get_footer(); ?>

<style>
  body{
    width: 100vw;
  }
  footer{
    position: fixed;
    bottom: 0;
    width: 100vw;
    z-index: 100;
  }
</style>