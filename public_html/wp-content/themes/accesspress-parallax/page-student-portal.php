<?php
/*
Template Name: Student Portal
*/

if ($_POST['log-out']){
	session_destroy();
	wp_redirect(get_permalink());
}


$flag = 0;
if ($_POST['login']){
	$roll = esc_sql(strip_tags($_POST['roll']));
	$password = md5(esc_sql(strip_tags($_POST['password'])));

	global $wpdb;
	$result =  $wpdb->get_row("SELECT * FROM user_list WHERE roll=$roll");

	if (!$result){
		$flag = 1;
	}
	else if ($result->password !== $password){
		$flag = 2;
	}
	else{
		$_SESSION['elabs-name'] = $result->name;
		$_SESSION['elabs-roll-number'] = $result->roll;
		$_SESSION['elabs-email-id']=$result->email;
		$_SESSION['elabs-logged-in']=true;
	}
}

get_header(); ?>

<style>	
	.bottom-footer{
		position: fixed;
		bottom: 0;
		width: 100%;
		z-index: 1000;
	}
	.container{
		z-index: 10;
	}
	#content{
		z-index: inherit;
	}
	#masthead{
		z-index: 15;
	}
	#myModal, .modal-dialog, .modal-content{
		z-index: 30;
	}
	.modal-backdrop{
		z-index: 5;
	}
	#blog-course{
    box-shadow: 0 0 1px #ddd;
	}
	#blog-course: hover{
	    box-shadow: 0 0 2vmin #ddd;
	}
</style>


<div class="container">




<?php

if (!isset($_SESSION['elabs-roll-number']) && !isset($_SESSION['elabs-name']) && !isset($_SESSION['elabs-email-id']) && !isset($_SESSION['elabs-logged-in'])){ ?>

<h1 style="color: #E66432;"><?php the_title(); ?></h1>

<center>

	<?php
	if ($flag===0){ ?>
	<br><br><br><h6>You need to be logged in to view this page. </h6>
	<br><br><h4>To Log in <a href="#myModal" data-toggle="modal" style="color: #E56432">Click Here</a></h4>
	<br><h4>Don't have an account? <a href="<?php echo get_home_url(); ?>/register/" style="color: #E56432">Sign Up</a></h4>

	<?php }else{ ?>
	<br><br><br><h6 style="color: #E56432; font-weight: 900;">Incorrect Credentials. Are you sure you Registered? </h6>
	<br><h4>Click here to Try to <a href="#myModal" data-toggle="modal" style="color: #E56432">Log In</a> Again.</h4>
	<br><h4>Don't have an account? <a href="<?php echo get_home_url(); ?>/register/" style="color: #E56432">Sign Up</a></h4>

	<?php } ?>

<?php
}else{
	global $wpdb;
	$roll = $_SESSION['elabs-roll-number'];
	$result = $wpdb->get_row("SELECT * FROM user_list WHERE roll = $roll");
?>

<br/><br/>
<h5 style="float: left; display: inline-block; color: #E56432;">Welcome <?php echo $result->name ?>,</h5>
<div style="display: inline-block; float: right">
<form action="" method="post">
	<input type="hidden" name="log-out" value="true">
	<button class="btn" type="submit" style="float: right;display: inline; margin: 2vmin;">Log Out</button>
</form>

</div>

</div>


<center>
<div class="row" style="padding: 2vmin 3vmin;">


	<div class="col-xs-12 col-sm-5" style=" margin-bottom: 2vmin;">

		<div style="box-shadow: 0 0 1vmin #ddd; padding: 2vmin; border-top: 1vmin solid #E56432">

			<?php if ($result->gender === "Male"){ ?>
			<img src="<?php echo wp_get_attachment_url(337); ?>" alt="Male Gravatar" style="width: 15vmax; height: auto; border-radius: 50%; border-style: double; border-width: 1vmin; border-color: #E56432; border-spacing: 2px;">
			<?php }else{ ?>
			<img src="<?php echo wp_get_attachment_url(338); ?>" alt="Female Gravatar" style="width: 15vmax; height: auto; border-radius: 50%; border-style: double; border-width: 1vmin; border-color: #E56432; border-spacing: 2px;">
			<?php } ?>

			<h6 style="color: #E66432;"><?php echo $result->name; ?> </h6>
			<p><?php echo $result->email; ?> </p>
			<hr>
			<div class="row" style="margin-bottom: 0;">
				<div class="col-xs-6">
					<p style="text-align: left">Roll Number</p>
				</div>
				<div class="col-xs-6">
					<p style="text-align: right"><?php echo $result->roll; ?>
					</p>
				</div>
			</div>
			<hr style="margin-top: 0;">
			<div class="row" style="margin-bottom: 0;">
				<div class="col-xs-6">
					<p style="text-align: left">Gender</p>
				</div>
				<div class="col-xs-6">
					<p style="text-align: right"><?php echo $result->gender; ?>
					</p>
				</div>
			</div>
			<hr style="margin-top: 0;">
			<div class="row" style="margin-bottom: 0;">
				<div class="col-xs-6">
					<p style="text-align: left">Course</p>
				</div>
				<div class="col-xs-6">
					<p style="text-align: right"><?php echo $result->course1; ?>
					</p>
				</div>
			</div>

		</div>


	</div>
	<div class="col-xs-12 col-sm-7">

		<div  style="box-shadow: 0 0 1vmin #ddd; padding: 2vmin; border-top: 1vmin solid #E56432;">

			<h6 style="color: #E66432;">Course Information</h6>
			<hr>

			<?php

 			$args = array('post_type' => 'course-structure');
    		$loop = new WP_Query($args); ?>

    		<div class="row">

    			<div class="col-xs-10 col-xs-offset-1" style="vertical-align: middle; ">

   					<?php
	    				$course1count = 0; 
	    				if ($loop -> have_posts()):

			    			while ($loop -> have_posts()): $loop -> the_post();

	        					if ($result->course1 == get_the_title()){ ?>

	          						<p style="font-weight: bold;">Course Content for <?php echo $result->course1; ?>:</p>

	 		    	     			<p style="text-align: left;"><?php echo get_the_content(); ?></p>

	          					<?php

	          						$course1count = 1;
	        					}

	      					endwhile;

	    				endif;

	    				if ($course1count===0){ ?>

	    				<div id="blank">

	    					<h6>You haven't selected any course</h6>

	    				</div>

	    				<?php }
	    			?> 

    			</div>


	    	</div>


    	</div>

	</div>
</div>

<div style="box-shadow: 0 0 1vmin #ddd; padding: 2vmin; border-top: 1vmin solid #E56432; margin: 2vmin; width: 96vw;">

	<?php 

	if ($result->course1 === "None"){ ?>

	<h6>You aren't registered for any course. Please register for our classes to view this.</h6>

	<?php 
	}
	else{ ?>

	<h6>Resources</h6>

	<?php 
		$args = array('post_type' => 'post', 'cat' => array(get_cat_ID('Blog '.$result->course1)));

	$loop = new WP_Query($args);

	if ($loop -> have_posts()): ?>

	<div class="row">
		
		<?php 
		while ($loop -> have_posts()): $loop -> the_post();

			$category = get_the_category();

			if ($category[0]->cat_name === "Blog Android"){
				$url = wp_get_attachment_url(364);
			}else if ($category[0]->cat_name === "Blog Embedded Systems"){
				$url = wp_get_attachment_url(365);
			}else if ($category[0]->cat_name === "Blog Iot"){
				$url = wp_get_attachment_url(366);
			}else if ($category[0]->cat_name === "Blog Networking"){
				$url = wp_get_attachment_url(368);
			}else if ($category[0]->cat_name === "Blog Java"){
				$url = wp_get_attachment_url(367);
			}else if ($category[0]->cat_name === "Blog Web Development"){
				$url = wp_get_attachment_url(369);
			}


			?>

			<div class="col-xs-6 col-sm-4 col-md-3" style="vertical-align: top; padding: 2vmin;" id="portal_posts">
				<div style="background-image: url('<?php echo $url; ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;height: 30vmin; width: 100%; margin: 0; padding: 0;"></div>
				<hr>

				<a href="<?php echo get_the_permalink(); ?>"><p style="font-weight: bold; font-size: 130%;"><?php echo get_the_title(); ?></p></a>
				
		    </div>

		    <?php 
		endwhile;
	endif; 
	?>

	</div>

	<?php } ?>


</div>
</center>

<?php }
?>

</div>
<br><br><br><br>

<?php include "login-modal.php" ?>

<?php get_footer(); ?>