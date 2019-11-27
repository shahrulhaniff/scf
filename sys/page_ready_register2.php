<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "database/server.php";
$id = $_POST['id'];
$fname= $_POST['emel'];
$emel= $_POST['emel'];
$phone= $_POST['id'];
$pwd= $_POST['pwd'];
	
$sql1="INSERT INTO userpro (id,fname,emel,phone,pwd,akaun,aktif) values('$id','$fname','$emel','$phone','$pwd','MEMBER','Y')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));


$sql2="INSERT INTO wallet (id,walletb,earning) values('$id','0','0')";
$result2=mysqli_query($conn,$sql2) or die(mysqli_error());
					
if($result){
echo ("<script LANGUAGE='JavaScript'>window.alert('Registered.');window.location.href='login.php';</script>");
}
else { echo "ada masalah"; }

?>