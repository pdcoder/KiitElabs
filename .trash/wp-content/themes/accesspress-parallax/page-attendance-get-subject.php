<?php
/*
Template Name: Page Attendance Get Subject
*/

if($_SERVER['REQUEST_METHOD']=='POST'){
	$mac = $_POST['mac'];
	$sql = "SELECT * from coordinator_details WHERE mac='$mac'";
	
	global $wpdb;
	
	$result = $wpdb->get_row($sql);
	
	$response = [];
	
	if($result){
		if(($wpdb->get_var("SELECT COUNT(*) FROM coordinator_details WHERE mac='$mac'"))>0){
			//$row = $result->fetch_assoc();
			$name = $result->name;
			$subject = $result->subject;
			$data = ["upload"=>"1", "name"=>$name, "subject"=>$subject];
			array_push($response, $data);
		}else{
			$data = ["upload"=>"0", "error"=>"Your phone is not registered"];
			array_push($response, $data);
			
		}
	}else{
		$data = ["upload"=>"0", "error"=>'Error Occured'];
		array_push($response, $data);
	}
	
	wp_send_json($response);
}
?>