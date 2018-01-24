<?php

	include 'db.php';


	if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
		$type = $_REQUEST['type'];
		switch($type){
			case 'view':
					$query = $conn->query('SELECT * FROM users');
					if($query->num_rows > 0){
								
						$data['records'] = $query->fetch_all(MYSQLI_ASSOC);
						$data['status'] = 'OK';
					}else{
						$data['records'] = array();
               			 $data['status'] = 'ERR';
					}
				echo json_encode($data);
				break;
			 case 'add':
			 		if(!empty($_POST['data'])){
			 				$d = array( 'name' => isset($_POST['data']['name'])?$_POST['data']['name']:"NULL",
										  'email' => isset($_POST['data']['email'])? $_POST['data']['email']:0,
										  'phone' => isset($_POST['data']['phone'])? $_POST['data']['phone']:"NULL"
										);
			 			$insert = "INSERT INTO users (name,email,phone,created,modified,status) VALUES ('".$d['name']."','".$d['email']."',".$d['phone'].",'".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."',1)";
			 			$a = $conn->query($insert);
			 			if($a){
			 				// $data['data'] = $conn->insert_id;
			 				$rec = $conn->query('select * from users where id = '.$conn->insert_id);
			 				if($rec->num_rows > 0){
			 					$data['data'] = $rec->fetch_assoc();
			 				}
                   		  	$data['msg'] = 'User data has been added successfully.';
               			 	$data['status'] = 'OK';
			 			}else{
						$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 			}
			 		}else{
			 				$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 		}
			 		echo json_encode($data);
			 		break; 
			 	case 'edit':
			 		if(!empty($_POST['data'])){
			 				$d = array( 'name' => isset($_POST['data']['name'])?$_POST['data']['name']:"NULL",
										  'email' => isset($_POST['data']['email'])? $_POST['data']['email']:0,
										  'phone' => isset($_POST['data']['phone'])? $_POST['data']['phone']:"NULL"
										);
			 			$update = "UPDATE users SET name = '".$d['name']."',email = '".$d['email']."',phone = '".$d['phone']."',modified = '".date('Y-m-d H:i:s')."' WHERE id= ".$_POST['data']['id']."";
			 			// print_r($update);
			 			$conn->query($update);
			 			if($conn->affected_rows > 0){
			 				// $data['data'] = $conn->insert_id;
			 				// $rec = $conn->query('select * from users where id = '.$conn->insert_id);
			 				// if($rec->num_rows > 0){
			 				// 	$data['data'] = $rec->fetch_assoc();
			 				// }
                   		  	$data['msg'] = 'User data has been added successfully.';
               			 	$data['status'] = 'OK';
			 			}else{
						$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 			}
			 		}else{
			 				$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 		}
			 		echo json_encode($data);
			 		break;
			 		case 'delete':
			 		if(!empty($_POST['data'])){
			 				
			 			$update = "DELETE FROM  users  WHERE id= ".$_POST['data']."";
			 			// print_r($update);
			 			$conn->query($update);
			 			if($conn->affected_rows > 0){
			 				// $data['data'] = $conn->insert_id;
			 				// $rec = $conn->query('select * from users where id = '.$conn->insert_id);
			 				// if($rec->num_rows > 0){
			 				// 	$data['data'] = $rec->fetch_assoc();
			 				// }
                   		  	$data['msg'] = 'User data has been deleted successfully.';
               			 	$data['status'] = 'OK';
			 			}else{
						$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 			}
			 		}else{
			 				$data['msg'] = 'Some Error Occured';
               			 $data['status'] = 'ERR';
			 		}
			 		echo json_encode($data);
			 		break;
			default:	
				echo "{'status':'INVALID'}";
			}
	}
?>