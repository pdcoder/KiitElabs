<?php

/*
Template Name: Control Panel
*/  

get_header();
?>

<?php 
global $wpdb;

if ($_POST['original_roll']){
	$original_roll = $_POST['original_roll'];

	$username = $_POST['user_name'];
  	$username = esc_sql(strip_tags($username));

  	$useremail = $_POST['user_email'];
  	$useremail = esc_sql(strip_tags($useremail));

  	$number = $_POST['user_number'];
  	$number = esc_sql(strip_tags($number));

  	$roll = $_POST['user_roll'];
  	$roll = esc_sql(strip_tags($roll));

  	$gender = $_POST['user_gender'];
  	$gender = esc_sql(strip_tags($gender));

  	$password1 = $_POST['user_password1'];
  	$password1 = md5(esc_sql(strip_tags($password1)));

  	$password2 = $_POST['user_password2'];
  	$password2 = md5(esc_sql(strip_tags($password2)));

  	$course1 = $_POST['user_course1'];
  	$course1 = esc_sql(strip_tags($course1));


  	$wpdb->update( 
	'user_list', 
	array( 
		'name' => $username,
		'email' => $useremail,
		'number' => $number,
		'roll' => $roll,
		'gender' => $gender,
		'password' => $password1,
		'course1' => $course1
	), 
	array( 'roll' => $original_roll ), 
	array( 
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s'
	), 
	array( '%s' ) 
	);
}

//This is the password
$password = "TheDarkKnightWillRise";
if ($_POST['master-password']){
  if ($password === esc_sql(strip_tags($_POST['master-password']))){
    $access = 1;
  }
  else{
    $access = 0;
  }
}
?>

<div class="container">

	<?php if ($_POST['individual-roll']){
	$rolll = $_POST['individual-roll'];

	$result = $wpdb->get_row('SELECT * FROM user_list WHERE roll="'.$rolll.'";'); ?>

	<div style="box-shadow: 0 0 2vmin #ccc; padding: 4vh 5vw; margin: 2vh 10vw;">

    <form action="" method="post">

      <label>Full Name: </label>
      <input type="text" name="user_name" placeholder="Enter name.." value="<?php echo $result->name; ?>" required class="form-control" style="border-radius: 4px">
      <br>

      <label>Email: </label>
      <input type="email" name="user_email" placeholder="Enter email.." value="<?php echo $result->email; ?>" required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Number: </label>
      <input type="number" name="user_number" placeholder="Enter number.." value="<?php echo $result->number; ?>" required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Roll: </label>
      <input type="number" name="user_roll" placeholder="Enter roll number.." value="<?php echo $result->roll; ?>" required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Gender: </label>
      <select name="user_gender" required class="form-control">
      	<?php if ($result->gender === "Male"){ ?>
        <option selected>Male</option>
        <option>Female</option>
        <?php }else{ ?>
        <option>Male</option>
        <option selected>Female</option>
        <?php } ?>
      </select>
      <br>

      <label>Password: <span id="span1" style="color: red; display: none;">Password is too short</span></label>
      <input id="password1" type="password" name="user_password1" value="<?php echo $result->password; ?>" placeholder="Enter password.." required class="form-control"  style="border-radius: 4px" onkeyup="checkpassword() ">
      <br>

      <label>Re Enter Password: <span id="span2" style="color: red; display: none;">Passwords do not match</span></label>
      <input id="password2" type="password" name="user_password2" value="<?php echo $result->password; ?>" placeholder="Re Enter password.." required class="form-control"  style="border-radius: 4px" onkeyup="checkpassword()">
      <br>

      <label>Course 1: </label>
      <select name="user_course1" required class="form-control">
      	<?php if ($result->course1==="Android"){ ?>
      	<option selected>Android</option>
      	<?php }else{ ?>
        <option>Android</option>
        <?php } ?>

        <?php if ($result->course1==="Web Development"){ ?>
      	<option selected>Web Development</option>
      	<?php }else{ ?>
        <option>Web Development</option>
        <?php } ?>

        <?php if ($result->course1==="IOT"){ ?>
      	<option selected>IOT</option>
      	<?php }else{ ?>
        <option>IOT</option>
        <?php } ?>

        <?php if ($result->course1==="Embedded Systems"){ ?>
      	<option selected>Embedded Systems</option>
      	<?php }else{ ?>
        <option>Embedded Systems</option>
        <?php } ?>

        <?php if ($result->course1==="Java"){ ?>
      	<option selected>Java</option>
      	<?php }else{ ?>
        <option>Java</option>
        <?php } ?>

        <?php if ($result->course1==="Networking"){ ?>
      	<option selected>Networking</option>
      	<?php }else{ ?>
        <option>Networking</option>
        <?php } ?>

      </select>
      <br>

      <input type="hidden" name="original_roll" value="<?php echo $result->roll; ?>">

      <button type="submit" class="btn btn-block" id="button">Submit</button>

    </form>

  </div>

	<?php }else if ($access === 1){ 

	$result = $wpdb->get_results("SELECT * FROM user_list ORDER BY roll ");

	$count = $wpdb->num_rows; 
	$i=0;
	?>
	<center>

	<div class="row">

	<h2>No of students: <?php echo $count; ?> </h2>

	<?php 
	foreach($result as $a){ ?>

	<div class="col-xs-6 col-sm-4 col-md-3" style="box-shadow: 0 0 1vmin #ddd; padding: 1vmin 2vmin" id="item">

		<?php if ($a->gender === "Male"){ ?>
			<img src="<?php echo wp_get_attachment_url(337); ?>" alt="Male Gravatar" style="width: 15vmax; height: auto; border-radius: 50%; border-style: double; border-width: 1vmin; border-color: #E56432; border-spacing: 2px;">
			<?php }else{ ?>
			<img src="<?php echo wp_get_attachment_url(338); ?>" alt="Female Gravatar" style="width: 15vmax; height: auto; border-radius: 50%; border-style: double; border-width: 1vmin; border-color: #E56432; border-spacing: 2px;">
		<?php } ?>

		<hr>

		<h4><?php echo $a->roll ?></h4>
		<br>
		<form action="" method="post">
			<input type="hidden" name="individual-roll" value="<?php echo $a->roll; ?>">
			<button type="submit" class="btn btn-block">Edit Details</button>
		</form>



	</div>
	<?php }
	?>

	</div>
	</center>

	<?php }else if ($access === 0){ ?>
  <br><br>
  <h2>Incorrect Password. Permission Denied.</h2>
  <form action="" method="post">
  <label>Enter password:</label>
  <input type="password" name="master-password" required class="form-control">
  <hr>
  <button class="btn btn-block" type="submit">Submit</button>

  <?php }else{ ?>
  <br><br>
  <form action="" method="post">
  <label>Enter password:</label>
  <input type="password" name="master-password" required class="form-control">
  <hr>
  <button class="btn btn-block" type="submit">Submit</button>

  <?php } ?>

</div>
<br><br><br>


<?php get_footer(); 