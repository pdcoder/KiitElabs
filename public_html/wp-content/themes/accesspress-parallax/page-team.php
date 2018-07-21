<?php


/*
Template Name: Team Page
*/


get_header(); ?>

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

<?php

$array = array();

$args = array('post_type' => 'members', 'orderby' => 'date', 'order' => 'ASC');

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
    <div id="button-div">
        <button class="btn btn-block" id="button_team">The Team</button>
        <button class="btn btn-block" id="button_alumni">The Alumni</button>
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
            <div id='year4' class="year">
            <!--h2>The Einsteins'</h2-->

            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='4'){ ?>
                    <div class="memberimages">
                    
                        <div class="content-members">
                            <div class="layer">
                                <center>
                                    <?php if($a[2]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[2]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'>
                                        </a>
                                    <?php }if ($a[3]!== ''){ ?>  
                                        <a target="_blank"href=' <?php echo $a[3]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                                <center>
                                    <?php if($a[4]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[4]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'>
                                        </a> 
                                    <?php }if ($a[5]!== ''){ ?> 
                                        <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'>
                                            <img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                            </div>
                            <img src=' <?php echo $a[1]; ?>' alt='.$a[0].'>
                        </div>
                        <h5 style='text-align: center;'> <?php echo $a[0]; ?></h5>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            
            </div>
            <?php } 

            if ($count3!=0){ ?>
            <div id='year3' class="year">
            <!--h2>The Teslas'</h2-->

            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='3'){ ?>
                    <div class="memberimages">
                    
                        <div class="content-members">
                            <div class="layer">
                                <center>
                                    <?php if($a[2]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[2]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'>
                                        </a>
                                    <?php }if ($a[3]!== ''){ ?>  
                                        <a target="_blank"href=' <?php echo $a[3]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                                <center>
                                    <?php if($a[4]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[4]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'>
                                        </a> 
                                    <?php }if ($a[5]!== ''){ ?> 
                                        <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'>
                                            <img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                            </div>
                            <img src=' <?php echo $a[1]; ?>' alt='.$a[0].'>
                        </div>
                        <h5 style='text-align: center;'> <?php echo $a[0]; ?></h5>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            
            </div>
            <?php } 
            
            if ($count2!=0){ ?>
            <div id='year2' class="year">
            <!--h2>The Schrodingers'</h2-->

            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='2'){ ?>
                    <div class="memberimages">
                    
                        <div class="content-members">
                            <div class="layer">
                                <center>
                                    <?php if($a[2]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[2]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'>
                                        </a>
                                    <?php }if ($a[3]!== ''){ ?>  
                                        <a target="_blank"href=' <?php echo $a[3]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                                <center>
                                    <?php if($a[4]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[4]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'>
                                        </a> 
                                    <?php }if ($a[5]!== ''){ ?> 
                                        <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'>
                                            <img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                            </div>
                            <img src=' <?php echo $a[1]; ?>' alt='.$a[0].'>
                        </div>
                        <h5 style='text-align: center;'> <?php echo $a[0]; ?></h5>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            
            </div>
            <?php } 
           
            if ($count1!=0){ ?>
            <div id='year1' class="year">
            <!--h2>The Hawkings'</h2-->

            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='1'){ ?>
                    <div class="memberimages">
                    
                        <div class="content-members">
                            <div class="layer">
                                <center>
                                    <?php if($a[2]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[2]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'>
                                        </a>
                                    <?php }if ($a[3]!== ''){ ?>  
                                        <a target="_blank"href=' <?php echo $a[3]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                                <center>
                                    <?php if($a[4]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[4]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'>
                                        </a> 
                                    <?php }if ($a[5]!== ''){ ?> 
                                        <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'>
                                            <img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                            </div>
                            <img src=' <?php echo $a[1]; ?>' alt='.$a[0].'>
                        </div>
                        <h5 style='text-align: center;'> <?php echo $a[0]; ?></h5>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            
            </div>
            <?php }   ?>

      </div>

      <div style="display: none;" id="alumni">
        

        <?php if ($count0!=0){ ?>
            <div id='year0' class="year">
            <!--h2>The Darwins'</h2-->

            
            <?php
            $i=0;
            
            foreach($array as $a){
                if ($a[6]==='0'){ ?>
                    <div class="memberimages">
                    
                        <div class="content-members">
                            <div class="layer">
                                <center>
                                    <?php if($a[2]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[2]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(242); ?>' alt='fb link'>
                                        </a>
                                    <?php }if ($a[3]!== ''){ ?>  
                                        <a target="_blank"href=' <?php echo $a[3]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(245); ?>' alt='linkedin link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                                <center>
                                    <?php if($a[4]!== ''){ ?>
                                        <a target="_blank"href=' <?php echo $a[4]; ?>'>
                                            <img src='<?php echo wp_get_attachment_url(243); ?>' alt='github link'>
                                        </a> 
                                    <?php }if ($a[5]!== ''){ ?> 
                                        <a href='mailto: <?php echo $a[5]; ?>? Subject=Contact%20Us' target='_top'>
                                            <img src='<?php echo wp_get_attachment_url(244); ?>' alt='gmail link'>
                                        </a> 
                                    <?php } ?>
                                </center>
                            </div>
                            <img src=' <?php echo $a[1]; ?>' alt='.$a[0].'>
                        </div>
                        <h5 style='text-align: center;'> <?php echo $a[0]; ?></h5>
                    </div>
                    <?php
                    $i++;
                }
            } ?>
            
            </div>
            <?php }   ?>

      </div>

    </center>
    <br><br><br>
      
    

<?php get_footer(); ?>