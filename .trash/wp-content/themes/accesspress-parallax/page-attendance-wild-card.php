<?php
/*
Template Name: Page Attendance Wild Card
*/

global $wpdb;

if($_SERVER['REQUEST_METHOD']=='POST'){
	$subject = $_POST['subject'];
	$roll = $_POST['roll'];
	
	if(!RollExists($roll)){
		Register_new_student($roll);
	}
	
	//$sql = "UPDATE main_attendance SET attendance = attendance+1 WHERE subject='$subject'  AND roll = '$roll'";
	//clearStoredResults();



	$result = $wpdb->get_row("SELECT * FROM main_attendance WHERE subject = '$subject' AND roll = '$roll' ");
	$attendance = $result->ATTENDANCE;
	$attendance += 1;
    



	$result = $wpdb->update(
		'main_attendance',
		array(
			'attendance' => $attendance
		),
		array(
			'SUBJECT' => $subject,
			'ROLL' => $roll
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
	
	if($result!==false){
		$data = ["upload"=>"1", "attendance"=>"Has been uploaded successfully"];
		array_push($response,$data);
		
	}else{
		
		$data = ["upload"=>"01", "error"=>"Error Ocurred"];
		array_push($response,$data);
	}
	
	wp_send_json($response);
	
	}
	
	function RollExists($roll){
		global $wpdb;

		$s = "SELECT * FROM registration WHERE roll='$roll'";
	
		$res = $wpdb->get_row($s);



		$res = $res->roll;
		
		$response = [];
		
		if($res){
			//if($wpdb->get_var("SELECT COUNT(*) FROM registration WHERE roll='$roll'")>0)
			//	return true;
			//else 
			//	return false;
			return true;
		}else{
			//$data = ["upload"=>"02", "error"=>"Error Occured"];
			//array_push($response,$data);
			//wp_send_json($response);
			return false;
			
		}
	}
	function Register_new_student($roll){

		global $wpdb;
		
		$json_res_new = [];
		
		if(strlen($roll)!=7){
			$data = ["upload"=>"03", "error"=>"Invalid Roll Number. Please Enter a valid roll number"];
			array_push($json_res_new, $data);
			wp_send_json($data);
		}else{
			$date = new DateTime();
			
		$mac =$date->getTimestamp();
		
			   
			   $sql1 = "INSERT INTO Registration VALUES ('$roll', '$mac');";
			   $sql2="INSERT INTO main_attendance VALUES('$roll','android','',0);";
			   $sql3="INSERT INTO main_attendance VALUES('$roll','networking','',0);";
			   $sql4="INSERT INTO main_attendance VALUES('$roll','embedded','',0);";
			   $sql5="INSERT INTO main_attendance VALUES('$roll','web','',0);";
			   $sql6="INSERT INTO main_attendance VALUES('$roll','java','',0);";
			   $sql7="INSERT INTO main_attendance VALUES('$roll','iot','',0);";
			  $sql8="INSERT INTO main_attendance VALUES('$roll','communication','',0);";
			  

			  $result1 = $wpdb->insert(
			  	'registration',
			  	array(
			  		'roll' => $roll,
			  		'mac' => $mac
			  	),
			  	array(
			  		'%s',
			  		'%s'
			  	)
			  );

			  $result2 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'android',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result3 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'networking',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result4 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'embedded',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result5 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'web',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result6 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'java',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result7 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'iot',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );

			  $result8 = $wpdb->insert(
			  	'main_attendance',
			  	array(
			  		'ROLL' => $roll,
			  		'SUBJECT' => 'communication',
			  		'ATTENDANCE' => 0
			  	),
			  	array(
			  		'%s',
			  		'%s',
			  		'%d'
			  	)
			  );
			  
			  //$main_sql = $sql1.$sql2.$sql3.$sql4.$sql5.$sql6.$sql7.$sql8;
			   //$result = $conn->multi_query($main_sql);
		
		
		
		
		if($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7 && $result8){
			$data = ["upload"=>"1", "roll"=>$roll, "mac"=>$mac];
			array_push($json_res_new, $data);
			
		}else{
		$data = ["upload"=>"05", "error"=>"Error Occured"];
			array_push($json_res_new, $data);
			wp_send_json($json_res_new);
			
		}
		
		}
		
		
	
}

/*
function clearStoredResults(){

    do {
         if ($res = $wpdb->store_result()) {
           $res->free();
         }
        } while ($mysqli->more_results() && $mysqli->next_result());        

}
*/
?>