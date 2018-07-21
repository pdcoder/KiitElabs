<?php

/*
Template Name: Contact Us Page
*/
get_header();

if ($_POST['contact-submit']){
	
	$Cname = esc_sql(strip_tags($_POST['contact-name']));
	$Cemail = esc_sql(strip_tags($_POST['contact-email']));
	$Subject = esc_sql(strip_tags($_POST['Subject']));
	$message = esc_sql(strip_tags($_POST['message']));
	$header = "From: ".$Cname." <".$Cemail.">";

	if (mail('elabs.electronics@kiit.ac.in', $Subject, $message, $header)){
		echo "<script>";
		echo "alert('Mail sent');";
		echo "</script>";
	}else if (mail('elabs.service@gmail.com', $Subject, $message, $header)){
		echo "<script>";
		echo "alert('Mail sent');";
		echo "</script>";
	}
	else{
		echo "<script>";
		echo "alert('Mail not sent');";
		echo "</script>";
	}
	
}


?>

<div class="container">
	<h1 style="color: #E66432;"><?php echo get_the_title(); ?></h1>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7">
			<form action="<?php the_permalink(); ?>" method="post">
				<label>Name:</label>
				<input name="contact-name" type="text" required class="form-control">
				<label>Email: </label>
				<input type="email" name="contact-email" required class="form-control">
				<label>Subject: </label>
				<input type="text" name="Subject" required class="form-control">
				<label>Message: </label>
				<textarea name="message" required class="form-control" rows="6"></textarea>
				<input type="hidden" name="contact-submit" value="yes">
				<br>
				<button class="btn btn-block" type="submit">Submit</button>
			</form>
		</div>
		<div class="col-sx-12 col-sm-6 col-md-5">
			<center>
				<div>
					<h5 style="color: #E66432">
						Android: Shubham Agarwal - 9507695150<br/><br/>
						Embedded Systems: Shuvam Kumar - 9938283553<br/><br/>
						IOT: Vibhusita Singh - 9163814329<br/><br/>
						Java: Vivek Bharti - 9938282421<br/><br/>
						Machine Learning: Prakhar Priyesh - 7766932637<br/><br/>
						Networking: Shalika Singh - 9472660087<br/><br/>
						Web Development: Prakash Das - 9874261416
					</h5>
				</div>
			</center>
		</div>
	</div>
</div>
<hr>
<center>
<div class="row">
	<div class="col-xs-5 col-xs-offset-1">
		<a href="http://kiit.ac.in/schools/electronics-engineering/"><img src="<?php echo wp_get_attachment_url(687); ?>" style="height: 10vmin; width: auto; max-width: 90%;"></a>
	</div>
	<div class="col-xs-5">
		<a href="https://artofgiving.in.net/"><img src="<?php echo wp_get_attachment_url(503); ?>" style="height: 15vmin; width: auto; max-width: 90%;"></a>
	</div>
</div>
</center>
<br><br>

<?php 
get_footer();
?>
