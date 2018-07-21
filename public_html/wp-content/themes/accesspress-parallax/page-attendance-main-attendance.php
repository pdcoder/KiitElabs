<?php
/*
Template Name: Page Attendance Main Attendance
*/

global $wpdb;
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$mac = $_POST['mac'];
		$sql = "SELECT * FROM registration WHERE mac='$mac'";
		
		$response = [];
		global $wpdb;
		$result = $wpdb->get_row($sql);
		
		if($result !== false){
			$roll="";
			
			if(($wpdb->get_var("SELECT COUNT(*) FROM registration WHERE mac='$mac'")) > 0){
				//while($row = $result->fetch_assoc()){
					//$roll = $row["roll"];
					
				//}

				$roll = $result->roll;
				$subject = get_subject();

				$is_time_right = date_result($roll,$subject);
				$attendance = get_attendance($roll,$subject,$is_time_right);
				$data = ["upload"=>"1", "roll"=>$roll,"subject"=>$subject,"time"=>$is_time_right,"attendance"=>$attendance];
				array_push($response,$data);
				
			}else{
				$data = ["upload"=>"0", "error"=>"This phone is not registered to our database"];
				array_push($response, $data);
			}
			
		}else{
			$data = ["upload"=>"0", "error"=>"Error Occured"];
			array_push($response, $data);
			wp_send_json($response);
		}
		
		wp_send_json($response);
	}
	
	function get_attendance($roll,$subject,$is_time_right){
		global $wpdb;
		$sql = "SELECT * FROM main_attendance WHERE roll='$roll' and subject='$subject'";
		$result = $wpdb->get_row($sql);
		$present_attendance =0;
		if($result){
			//$row = $result->fetch_assoc();
			$present_attendance = $result->ATTENDANCE;
			if($is_time_right==false){
				return $present_attendance;
			}
			else{
				$present_attendance = $present_attendance+1;
				//$sql = "UPDATE main_attendance SET attendance='$present_attendance' WHERE roll='$roll' and subject='$subject'";
				//$result2 = $wpdb->query($sql);
				$result2 = $wpdb->update(
					'main_attendance',
					array(
						'ATTENDANCE' => $present_attendance
					),
					array(
						'ROLL' => $roll,
						'SUBJECT' => $subject
					),
					array(
						'%d'
					),
					array(
						'%s',
						'%s'
					)
				);
				if($result2 === false){
					$data = ["upload"=>"0", "error"=>'Error Occured 1'];
					wp_send_json($data);
				}else{
					return $present_attendance;
				}
			}
		}else{
			$data = ["upload"=>"0", "error"=>"Error Occured 2"];
			wp_send_json($data);
		}
	}
	
	function get_subject(){
		global $wpdb;
		$sql = "SELECT * FROM subject_window WHERE valid=1";
		
		$response = [];
		$result = $wpdb->get_row($sql);
		
		if($result ){
			$subject="";
			
			if(($wpdb->get_var("SELECT COUNT(*) FROM subject_window WHERE valid=1"))>0){
				//$row = $result->fetch_assoc();
				$subject = $result->subject;
			}else{
				$data = ["upload"=>"0", "error"=>"This phone is not registered to our database"];
				array_push($response, $data);
				wp_send_json($response);
			}
			
		
	}else{
			$data = ["upload"=>"0", "error"=>"Error Occured 3"];
			array_push($response, $data);
			wp_send_json($response);
		}
	return $subject;
	}
	
	function date_result($roll, $subject){
		global $wpdb;
		$sql = "select * from main_attendance where roll='$roll' and subject='$subject'";
		$result = $wpdb->get_row($sql);
		$date_previous = "";
		if($result){
			//$row = $result->fetch_assoc();
			$date = $result->PERIOD;
			$date_previous = $date;
		}else{
			$response = ["upload"=>"0", "error"=>"Error Occured 4"];
			wp_json_encode($response);
		}
		if(strlen($date)<3){
			$today =getdate();
			$date = $today["year"]."-".$today["mon"]."-".$today["mday"];
			$sql = "update main_attendance SET period='$date' where roll='$roll' and subject='$subject'";
			$result = $wpdb->update(
				'main_attendance',
				array(
					'PERIOD' => $date
				),
				array(
					'ROLL' => $roll,
					'SUBJECT' => $subject
				),
				array(
					'%s'
				),
				array(
					'%s',
					'%s'
				)
			);
			//$result = $wpdb->query($sql);
			if($result === false){
				$response = ["upload"=>"0", "error"=>"Error Occured 5"];
				wp_send_json($response);
			}
			return true;
		}else{
			$today =getdate();
			$date = $today["year"]."-".$today["mon"]."-".$today["mday"];
			$interval = date_time_interval($date_previous,$date);
			if($interval<=1){
				return false;
			}else{
				$sql = "update main_attendance SET period='$date' where roll='$roll' and subject='$subject'";
				$result = $wpdb->update(
					'main_attendance',
					array(
						'PERIOD' => $date
					),
					array(
						'ROLL' => $roll,
						'SUBJECT' => $subject
					),
					array(
						'%s'
					),
					array(
						'%s',
						'%s'
					)
				);
				//$result = $wpdb->query($sql);
				if(!$result){
					$response = ["upload"=>"0", "error"=>"Error Occured 6"];
					wp_send_json($response);
				}
				return true;
			}
		}
	}
	

	function date_time_interval($d1, $d2){

		$date1 = new DateTime($d1);
		$date2 = new DateTime($d2);
		$interval = $date1->diff($date2);
		return $interval->d;
	}
?>