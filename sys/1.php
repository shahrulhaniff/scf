<?php
ob_start();
session_start();
include "database/server.php";

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//header("Access-Control-Allow-Headers: Authorization, Content-Type");
//header("Access-Control-Allow-Origin: *");
//header('content-type: application/json; charset=utf-8');

$username = $_POST['id'];
$password = $_POST['pwd'];

$qry="SELECT * FROM userpro WHERE id='$username' and pwd='$password'";
	
$result=mysqli_query( $conn, $qry) or die(mysql_error());
	
if($result) {
		    if(mysqli_num_rows($result) > 0) {
				
					//Login Successful
					session_regenerate_id();
					$row = mysqli_fetch_assoc($result);
					
					//session
					$_SESSION['USER'] = $row['id'];
					$_SESSION['pwd'] = $row['pwd'];
					$id = $row['id'];
					
					//Update IP and Last login --> $time=NOW();
					$ipaddress = $_SERVER['REMOTE_ADDR'];
					$qry2="UPDATE userpro SET lastlogin= NOW() , ipaddress ='$ipaddress' WHERE id='$id'";
					$result2=mysqli_query($conn,$qry2);
					
					
					//tetapkan position utk akses sistem
					$position = $row['akaun'];
					$_SESSION['USER_TYPE'] = $row['akaun'];
					
				
					//Go to home page
					 if ($_SESSION['USER_TYPE'] == 'MASTER') {
						header("location: index_master.php");//echo $position;
					 }
					
					else if ($_SESSION['USER_TYPE'] == 'MEMBER'){
						header("location: index.php");
						//echo $ipaddress;
					}
					
					else if ($_SESSION['USER_TYPE'] == 'LP'){
						header("location: index_LP.php");
					}
					
					else{ 
						echo"<script>alert('Access Denied! 0');document.location.href='login.php';</script>"; 
					}
					
					exit();
					}
			
			else{
				echo"<script>alert('Access Denied!');document.location.href='login.php';</script>";
			}
	}
	
	else {
		die("Query failed");
	}

?>