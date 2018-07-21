<?php
/*
Template Name: Page Attendance Subject
*/

global $wpdb;

if($_SERVER['REQUEST_METHOD']=='POST'){
	$key = $_POST['key'];
	$subject = $_POST['subject'];
	//$sql = "UPDATE subject_window SET valid ='$key'  WHERE subject='$subject'";
	//$result = $wpdb->query($sql);
	$result = $wpdb->update(
		'subject_window',
		array(
			'valid' => $key
		),
		array(
			'subject' => $subject
		),
		array(
			'%d'
		),
		array(
			'%s'
		)
	);

	$response = [];
	
	if($result){
		$data = ["upload"=>"1", "subject"=>$subject, "key"=>$key];
		array_push($response, $data);
	}else{
		$data = ["upload"=>"0","error"=>'Error Ocurred' ];
		array_push($response, $data);
		
	}
	
	wp_send_json($response);
}
?>