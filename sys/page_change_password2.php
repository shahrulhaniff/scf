<?php
include "database/server.php";

$id = $_POST['id'];
$cpwd= $_POST['cpwd'];
$npwd= $_POST['npwd'];
$rpwd= $_POST['rpwd'];


$sql="SELECT pwd from userpro WHERE id='$id' ";
$data = mysqli_query($conn,$sql);
$info = mysqli_fetch_array( $data );
$dpwd = $info['pwd'];

if($cpwd!=$dpwd){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Current Password Invalid');window.location.href='page_change_password.php';</script>");
}
else if($npwd!=$rpwd){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Confirm Your New Password');window.location.href='page_change_password.php';</script>");
}
else{
$sqlUP="UPDATE userpro set pwd = '$npwd' WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());

	if($resultUP){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Password changed!');window.location.href='index.php';</script>");
	exit();

	}
	else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_change_password.php';</script>"); }
}
?>