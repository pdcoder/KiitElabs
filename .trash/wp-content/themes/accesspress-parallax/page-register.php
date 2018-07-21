<?php
/**
 * The template for displaying course pages.
 *
 *
 * @package accesspress_parallax
 */

/*
Template Name: Registration Page
*/
$wpdb->show_errors();

if($_POST['Reg']){
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
  if ($course1===null){
    $course1 = "None";
  }
  $course1 = esc_sql(strip_tags($course1));

  if (stripos($course1, "Android")!==false){
    $course1 = 'Android';
  }
  if (stripos($course1, "Java")!==false){
    $course1 = 'Java';
  }
  if (stripos($course1, "Web")!==false){
    $course1 = 'Web Development';
  }
  if (stripos($course1, "Networking")!==false){
    $course1 = 'Networking';
  }
  if (stripos($course1, "IOT")!==false){
    $course1 = 'IOT';
  }
  if (stripos($course1, "Embedded")!==false){
    $course1 = 'Embedded Systems';
  }



  global $wpdb;
  $count1 = $wpdb->get_row("SELECT * FROM user_list WHERE roll=$roll;");
  $count2 = $wpdb->get_row("SELECT * FROM user_list WHERE email='".$useremail."';");
  $count3 = $wpdb->get_row("SELECT * FROM user_list WHERE number=".$number.";");
  if ($count1 && $count2 && $count3 && $count1->course1==="None"){

    $count = 0;
    $wpdb->update( 
      'user_list', 
      array( 
      'course1' => $course1
    ), 
    array( 'roll' => $roll ), 
    array( 
      '%s'
    ), 
    array( '%s' ) 
    );

    $numberseats = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="'.$course1.'";');
    $numberseats = $numberseats->seats;
    $numberseats = $numberseats-1;
    if ($numberseats<=0){
      $numberseats=0;
    }

    $wpdb->update(
      'seats_remaining',
      array(
        'seats' => $numberseats,
      ),
      array(
        'course' => $course1
      ),
      array(
        '%d'
      ),
      array(
        '%s'
      )
    );
  }

  if ($count1===null && $count2===null && $count3===null){
    $count = 0;

    $numberseats = $wpdb->get_row('SELECT * FROM seats_remaining WHERE course="'.$course1.'";');
    $numberseats = $numberseats->seats;
    $numberseats = $numberseats-1;
    if ($numberseats<=0){
      $numberseats=0;
    }

    $wpdb->update(
      'seats_remaining',
      array(
        'seats' => $numberseats,
      ),
      array(
        'course' => $course1
      ),
      array(
        '%d'
      ),
      array(
        '%s'
      )
    );

    $wpdb->insert( 
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
      array( 
        '%s', 
        '%s',
        '%s',
        '%s',
        '%s',
        '%s', 
        '%s'
      ) 
    );
  }

}

get_header(); ?>

<div class="container">

  <?php
  if ($count===0){ ?>

  <h1 style="color: #E66432;">You have been Registered Successfully. </h1>
  <h5>Follow our page <a href="https://www.facebook.com/kiitelabs">www.facebook.com/kiitelabs</a> on Facebook to get updates about our classes. </h5> 

  <?php }else if ($count1){ ?>

  <h1 style="color: #E66432;">It seems you have already registered using this roll number. </h1>
  <h5>Wrong roll number? <a href="">Click here</a> to try to Register again.</h5>

  <?php }else if ($count2){ ?>

  <h1 style="color: #E66432;">It seems you have already registered using this email. </h1>
  <h5>Wrong email? <a href="">Click here</a> to try to Register again.</h5>

  <?php }else if ($count3){ ?>

  <h1 style="color: #E66432;">It seems you have already registered using this mobile number. </h1>
  <h5>Wrong mobile number? <a href="">Click here</a> to try to Register again.</h5>

  <?php }else{ ?>

  <h2 style="color: #E66432;"><?php echo get_the_title(); ?></h2>
  <br>

  <div style="box-shadow: 0 0 2vmin #ccc; padding: 4vh 5vw; margin: 2vh 10vw;">

    <?php 
    if (have_posts()):
      while(have_posts()): the_post(); ?>

      <?php if (get_the_content()==="Registrations On"){ ?>
      <strong><p style="color: #E66432">Register for our classes.</p></strong>
      <?php } ?>
      
      <?php 
      if (get_the_content()==="Registrations Off"){ ?>
      <strong><p style="color: #E66432">This is to register for our Blogs and ask questions on our forum. Registration for courses aren't open.</p></strong>
      <?php } ?>

    <form action="" method="post" onsubmit="return check()">

      <label>Full Name: </label>
      <input type="text" name="user_name" placeholder="Enter name.." required class="form-control" style="border-radius: 4px">
      <br>

      <label>Email: </label>
      <input type="email" name="user_email" placeholder="Enter email.." required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Number: <span id="span3" style="color: red">Number not valid</span></label>
      <input id="user_number" type="number" name="user_number" placeholder="Enter number.." required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Roll: <span id="span4" style="color: red">Roll Number not valid</span></label>
      <input id="user_roll" type="number" name="user_roll" placeholder="Enter roll number.." required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Gender: </label>
      <select name="user_gender" required class="form-control">
        <option>Male</option>
        <option>Female</option>
      </select>
      <br>

      <label>Password: <span id="span1" style="color: red">Password is too short</span></label>
      <input id="password1" type="password" name="user_password1" placeholder="Enter password.." required class="form-control"  style="border-radius: 4px">
      <br>

      <label>Re Enter Password: <span id="span2" style="color: red">Passwords do not match</span></label>
      <input id="password2" type="password" name="user_password2" placeholder="Re Enter password.." required class="form-control"  style="border-radius: 4px">
      <br>
      <?php 
        if (get_the_content() === "Registrations On"){
      ?>

      <label>Course 1: </label>
      <select name="user_course1" required class="form-control" id="user_course1">
        <option disabled selected>Select a Course</option>
        <option id="android">Android</option>
        <option id="web">Web Development</option>
        <option id="iot">IOT</option>
        <option id="embedded">Embedded Systems</option>
        <option id="java">Java</option>
        <option id="networking">Networking</option>
      </select>
      <br>

      <?php } ?>

      <input type="hidden" name="Reg" value="true">

      <button type="submit" class="btn btn-block" id="button" disabled>Submit</button>
      
    </form>

      <?php 
      endwhile;
    endif; ?>

  </div>

  <?php } ?>
  <br><br><br>


</div>


<style>
footer{
  width: 100%;
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 100;
}
</style>

<?php get_footer(); ?>

<script>
  function check(){
    var x = jQuery('#user_course1 option:selected').text();
    var start = x.indexOf('(');
    var end = x.indexOf(')');
    var substr = x.substring(start+2, end-1);
    if (substr === '0'){
      return false;
    }
  }
  
  jQuery(document).ready(function(){
      checksubject();
      
      var width = jQuery(window).width();
      
      if (width > 768){
          window.setInterval(function(){
              checksubject();
          }, 1000);
      }else{
          window.setInterval(function(){
              checksubject();
          }, 10000);
      }
  })

  window.setInterval(function(){
    var pass1 = document.getElementById('password1').value;
    var pass2 = document.getElementById('password2').value;
    var roll = document.getElementById('user_roll').value;
    var user_number = document.getElementById('user_number').value;

    var alert1 = document.getElementById('span1');
    var alert2 = document.getElementById('span2');
    var alert3 = document.getElementById('span3');
    var alert4 = document.getElementById('span4');

    var button = document.getElementById('button');

    if (pass1.length < 6){
        alert1.style.display = "inline-block";
    }
    else{
        alert1.style.display = "none";
    }

    if (pass1!==pass2){
        alert2.style.display = "inline-block";
    }
    else{
        alert2.style.display = "none";
    }

    if (roll.toString().length < 7){
        alert4.style.display = 'inline-block';
    }
    else{
      alert4.style.display = 'none';
    }

    if (user_number.toString().length < 10){
      alert3.style.display = 'inline-block';
    }
    else{
      alert3.style.display = 'none';
    }

    if (pass1 === pass2 && pass1.length>=6 && roll.toString().length >= 7 && user_number.toString().length >= 10 ){
        button.disabled = false;
    }
    else{
        button.disabled = true;
    }
  }, 1000);

  function checksubject(){
    jQuery.ajax({
      url      : ajaxurl,
      type     : 'get',
      data     : {
        action : 'get_seats_remaining',
      },
      success  : function(response){
        var array = JSON.parse("[" + response + "]");
        if (array[0]['Android'] == '0'){
          jQuery('option#android').attr('disabled', 'disabled');
        }
        if (array[0]['Web'] == '0'){
          jQuery('option#web').attr('disabled', 'disabled');
        }
        if (array[0]['Networking'] == '0'){
          jQuery('option#networking').attr('disabled', 'disabled');
        }
        if (array[0]['IOT'] == '0'){
          jQuery('option#iot').attr('disabled', 'disabled');
        }
        if (array[0]['Java'] == '0'){
          jQuery('option#java').attr('disabled', 'disabled');
        }
        if (array[0]['Embedded'] == '0'){
          jQuery('option#embedded').attr('disabled', 'disabled');
        }
        
        document.getElementById('android').innerHTML = 'Android ( '+array[0]['Android']+' )';
        document.getElementById('java').innerHTML = 'Java ( '+array[0]['Java']+' )';
        document.getElementById('networking').innerHTML = 'Networking ( '+array[0]['Networking']+' )';
        document.getElementById('web').innerHTML = 'Web Development ( '+array[0]['Web']+' )';
        document.getElementById('iot').innerHTML = 'IOT ( '+array[0]['IOT']+' )';
        document.getElementById('embedded').innerHTML = 'Embedded Systems ( '+array[0]['Embedded']+' )';
      } 
    });
  }
</script>
