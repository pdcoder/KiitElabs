<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recruitment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        
    </script>
</head>
<body>
<div class="container">
	<h1 style="color: #E66432;">Register</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7">
            <form action="" method="post" onsubmit="return check()">
                <label>Full Name: </label>
      <input type="text" name="user_name" placeholder="Enter name.." required class="form-control" style="border-radius: 4px">
      <br>
                <label>Email: </label>
      <input type="email" name="user_email" placeholder="Enter email.." required class="form-control"  style="border-radius: 4px">
      <br>
                <label>Roll: <span id="span4" style="color: red">Roll Number not valid</span></label>
      <input id="user_roll" type="number" name="user_roll" placeholder="Enter roll number.." required class="form-control"  style="border-radius: 4px">
      <br>
                <label>Course: </label>
      <select name="user_course" required class="form-control" id="user_course">
        <option disabled selected>Select a Course</option>
        <option id="android">Android</option>
        <option id="web">Web Development</option>
        <option id="iot">IOT</option>
        <option id="embedded">Embedded Systems</option>
        <option id="java">Java</option>
        <option id="networking">Networking</option>
        <option id="ml">Machine Learning</option>
      </select>
      <br>
                <label>Year:</label>
      <select name="user_year" required class="form-control" id="user_year">
        <option disabled selected>Select Year</option>
        <option id="2">2nd</option>
        <option id="3">3rd</option>
      </select>
      <br>
                <label>Why do you want to join elabs? </label>
				<textarea name="message" required class="form-control" rows="6"></textarea>
				<input type="hidden" name="contact-submit" value="yes">
				<br>
                <button class="btn btn-warning" type="submit">Submit</button>
			</form>
        </div>
<div class="col-xs-12 col-sm-6 col-md-5">
        <br>
<div class="panel panel-warning">
  <div class="panel-heading">Notice</div>
  <div class="panel-body">Sample text<br>Sample text<br>Sample text<br>Sample text<br>Sample text<br>Sample text</div>
</div>
        
        </div>
            </div>
    
    </div>
    </body>
</html>
