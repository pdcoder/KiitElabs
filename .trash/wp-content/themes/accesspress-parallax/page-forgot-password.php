<?php 
/*
Template Name: Forgot Password Page
*/

if ($_SESSION['reset_passwords'] === 0){
	wp_redirect(home_url());
	exit;
}

get_header();
?>

<?php
$count = 0;
if ($_POST['reset_pwd']){
	$reset_roll = $_POST['reset-roll'];
	$reset_email = $_POST['reset-email'];

	global $wpdb;
	$result = $wpdb->get_row("SELECT * FROM user_list WHERE roll='".$reset_roll."' AND email='".$reset_email."';");

	if ($result){
		$random_number = mt_rand(100000, 999999);
		if (mail($reset_email, 'Reset Your Password', 'Enter the following code to reset your password for Elabs: '.$random_number, 'From: Elabs <elabs.service@gmail.com>')){
			$count = 1; //Mail sent successfully

			$result1 = $wpdb->get_row("SELECT * FROM reset_passwords WHERE roll='".$reset_roll."';");
			if ($result1){
				$wpdb->update(
					'reset_passwords',
					array(
						'code' => $random_number
					),
					array(
						'roll' => $reset_roll
					),
					array(
						'%s'
					),
					array(
						'%s'
					)
				);
			}else{
				$wpdb->insert(
					'reset_passwords',
					array(
						'roll' => $reset_roll,
						'code' => $random_number
					),
					array(
						'%s',
						'%s'
					)
				);
			}
		}else{
			$count = 2; //Mail Not sent
		}
	}
	else{
		$count = 3; //Incorrect Credentials
	}
}

if ($_POST['reset_pwd_submit']){
	$reset_roll = $_POST['reset-roll-submit'];
	$reset_email = $_POST['reset-email-submit'];
	$code = $_POST['code'];

	$result_code = $wpdb->get_row("SELECT * FROM reset_passwords WHERE roll='".$reset_roll."';");

	if ($result_code->code === $code){
		$count = 4; //Code is same as that sent through email
	}
	else{
		$count = 5; //Code doesn/t matches that of email
	}

}

if ($_POST['reset-password-final']){
	$password1 = md5($_POST['reset-password']);
	$password2 = md5($_POST['reset-password2']);
	$roll = $_POST['rollnumber'];

	$wpdb->update(
		'user_list',
		array(
			'password' => $password1
		),
		array(
			'roll' => $roll
		),
		array(
			'%s'
		),
		array(
			'%s'
		)
	);

	$wpdb->delete(
		'reset_passwords',
		array(
			'roll' => $roll
		),
		array(
			'%s'
		)
	);

	$count = 6;
}

?>

<div class="container">
	<h1 style="color: #E66432;"><?php the_title(); ?> </h1>
	<br>

	<div class="row">
		

		<?php if ($count === 0){ ?>

		<?php $_SESSION['reset_passwords'] = 1; ?>

		<div class="col-xs-10 col-sm-8 col-md-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-3" style="padding: 3vmin 2vmin; box-shadow: 0 0 2vmin #ddd;">

			<h6>Enter your details</h6>

			<form action="" method="post">
				<label>Roll Number: </label>
				<input type="number" name="reset-roll" required class="form-control">
				<label>Email:</label>
				<input type="email" name="reset-email" required class="form-control">
				<input type="hidden" name="reset_pwd" value="Yes">
				<br>
				<button type="submit" class="btn btn-block">Submit</button>
			</form>

		</div>

		<?php }else if ($count === 1){ ?>
		<h3>Please check your mail for code to reset your password</h3>
		<br>

		<div class="col-xs-10 col-sm-8 col-md-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-3" style="padding: 3vmin 2vmin; box-shadow: 0 0 2vmin #ddd;">

			<form action="" method="post">
				<label>Roll Number: </label>
				<input type="number" name="reset-roll-submit" required class="form-control" value="<?php echo $reset_roll; ?>" readonly>
				<label>Email:</label>
				<input type="email" name="reset-email-submit" required class="form-control" value="<?php echo $reset_email ?>" readonly>
				<label>Code</label>
				<input type="number" name="code" required class="form-control">
				<input type="hidden" name="reset_pwd_submit" value="Yes">
				<br>
				<button type="submit" class="btn btn-block">Submit</button>
			</form>

		</div>

		<?php }else if ($count === 2){ ?>

		<h2 style="color: #E66542">Something Went Wrong. <a href="<?php the_permalink(); ?>">Please Try Again.</a></h2>

		<?php }else if ($count === 3){ ?>

		<h2 style="color: #E66542">Incorrect Credentials. <a href="<?php the_permalink(); ?>">Please Try Again.</a></h2>

		<?php }else if ($count === 4){ ?>

		<div class="col-xs-10 col-sm-8 col-md-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-3" style="padding: 3vmin 2vmin; box-shadow: 0 0 2vmin #ddd;">


			<form action="" method="post">
				<label>Roll: </label>
				<input type="text" name="rollnumber" value="<?php echo $reset_roll; ?>" readonly>
				<label>New Password: <span id="span1" style="color: red">Password is too short</span></label>
				<input type="password" name="reset-password" required class="form-control" id="password1" onkeyup="checkpassword() ">
				<label>ReEnter New Password: <span id="span2" style="color: red">Passwords do not match</span></label>
				<input type="password" name="reset-password2" required class="form-control" id="password2" onkeyup="checkpassword() ">
				<input type="hidden" name="reset-password-final" value="Yes">
				<br>
				<button type="submit" class="btn btn-block" id="button" disabled>Submit</button>
			</form>

		</div>

		<?php }else if ($count === 5){ ?>

		<h2 style="color: #E66542">Please check the code sent through email.</h2>
	
		<div class="col-xs-10 col-sm-8 col-md-6 col-xs-offset-1 col-sm-offset-2 col-md-offset-3" style="padding: 3vmin 2vmin; box-shadow: 0 0 2vmin #ddd;">

			<form action="" method="post">
				<label>Roll Number: </label>
				<input type="number" name="reset-roll-submit" required class="form-control" value="<?php echo $reset_roll; ?>" readonly>
				<label>Email:</label>
				<input type="email" name="reset-email-submit" required class="form-control" value="<?php echo $reset_email ?>" readonly>
				<label>Code</label>
				<input type="number" name="code" required class="form-control">
				<input type="hidden" name="reset_pwd_submit" value="Yes">
				<br>
				<button type="submit" class="btn btn-block">Submit</button>
			</form>

		</div>

		<?php }else if ($count === 6){ ?>

		<h2>Password has been reset. Go back to <a href="<?php echo home_url(); ?>">Home Page</a></h2>

		<?php
		$_SESSION['reset_passwords'] = 0 ; ?>
		<?php } ?>

	</div>

</div>
<br><br><br>

<style>
footer{
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100vw;
	z-index: 1000;
}
</style>

<?php get_footer(); ?>