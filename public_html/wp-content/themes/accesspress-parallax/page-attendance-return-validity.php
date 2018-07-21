<?php
/*
Template Name: Page Attendance Return Validity
*/
		global $wpdb;
		
		$sql = "SELECT subject FROM subject_window WHERE valid = 1";
		
	$response = [];
	
		$result = $wpdb->get_row($sql);
		
		if($result){
			if($wpdb->get_var( "SELECT COUNT(*) FROM subject_window WHERE valid = 1 " ) > 0 ){
				//$row=$result->fetch_assoc();
				$subject  = $result->subject;
				$data = ["upload"=>"1", "subject"=>$subject];
				array_push($response,$data);
			}else{
				$data = ["upload"=>"0","error"=>"You are not supposed to give attendance right now"];
				array_push($response,$data);
			}
		}else{
			$data = ["upload"=>"0","error"=>'Error Occured'];
			array_push($response,$data);
		}
		
		wp_send_json($response);
	
?>