<?php
/*
Template Name: Page Attendance Underscore Wild Card
*/
global $wpdb;

if($_SERVER['REQUEST_METHOD']=='POST'){
	$subject = $_POST['subject'];
	$roll = $_POST['roll'];
	
	//$sql = "UPDATE main_attendance SET attendance = attendance+1 WHERE subject='$subject'  AND roll = '$roll'";
	
	$result = $wpdb->get_row("SELECT * FROM main_attendance WHERE subject = '$subject' AND roll = '$roll' ");
	$attendance = $result->attendance;

	$result = $wpdb->update(
		'main_attendance',
		array(
			'attendance' => $attendance + 1
		),
		array(
			'subject' => $subject,
			'roll' => $roll
		),
		array(
			'%d'
		),
		array(
			'%s',
			'%s'
		)
	);
	
	$response = [];
	
	if($result){
		$data = ["upload"=>"1", "attendance"=>"Has been uploaded successfully"];
		array_push($response,$data);
		
	}else{
		
		$data = ["upload"=>"0", "error"=>"Error Occured"];
		array_push($response,$data);
	}
	
	wp_send_json($response);
	
}
?>