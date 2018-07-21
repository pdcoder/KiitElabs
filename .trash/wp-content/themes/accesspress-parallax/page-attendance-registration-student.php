<?php
/*
Template Name: Page Attendance Registration Student
*/

global $wpdb;

	$json_res_new = [];
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$roll = $_POST['roll'];
		
		if(strlen($roll)!=7){
			$data = ["upload"=>"0", "error"=>"Invalid Roll Number. Please Enter a valid roll number"];
			array_push($json_res_new, $data);
		}else{
		$mac = $_POST['mac'];
		
			   
			   $sql1 = "INSERT INTO Registration VALUES ('$roll', '$mac');";
			   $sql2="INSERT INTO main_attendance VALUES('$roll','android','',0);";
			   $sql3="INSERT INTO main_attendance VALUES('$roll','networking','',0);";
			   $sql4="INSERT INTO main_attendance VALUES('$roll','embedded','',0);";
			   $sql5="INSERT INTO main_attendance VALUES('$roll','web','',0);";
			   $sql6="INSERT INTO main_attendance VALUES('$roll','java','',0);";
			   $sql7="INSERT INTO main_attendance VALUES('$roll','iot','',0);";
			  $sql8="INSERT INTO main_attendance VALUES('$roll','communication','',0);";
			  
			  //$main_sql = $sql1.$sql2.$sql3.$sql4.$sql5.$sql6.$sql7.$sql8;
			   //$result = $conn->multi_query($main_sql);
				
				/*$result1 = $wpdb->query($sql1);
				$result2 = $wpdb->query($sql2);
				$result3 = $wpdb->query($sql3);
				$result4 = $wpdb->query($sql4);
				$result5 = $wpdb->query($sql5);
				$result6 = $wpdb->query($sql6);
				$result7 = $wpdb->query($sql7);
				$result8 = $wpdb->query($sql8);
				*/

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
		
		
		if($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7 && $result8 ){
			$data = ["upload"=>"1", "roll"=>$roll, "mac"=>$mac];
			array_push($json_res_new, $data);
			
		}else{
		$data = ["upload"=>"0", "error"=>"Error Occured"];
			array_push($json_res_new, $data);
		}
		}
		wp_send_json($json_res_new);
		
		}
?>