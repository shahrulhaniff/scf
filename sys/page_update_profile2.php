<?php
include "database/server.php";

$id = $_POST['id'];
$fname= $_POST['fname'];
$address= $_POST['address'];
$phone= $_POST['phone'];

$sqlUP="UPDATE userpro set fname = '$address',address = '$fname' ,phone = '$phone' WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());

	if($resultUP){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Profile Updated!');window.location.href='page_update_profile.php';</script>");
	exit();

	}
	else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_update_profile.php';</script>"); }
?>