<?php
session_start();
include "database/server.php";
$id =  $_SESSION['USER'];
$aff_id = $_POST['id'];
$fname= $_POST['emel'];
$emel= $_POST['emel'];
$phone= $_POST['id'];
$pwd= $_POST['id'];

$data = mysqli_query($conn,"SELECT * FROM affiliate WHERE aff_id='".$id."'") or die(mysqli_error());
$info = mysqli_fetch_array( $data );
$lp_master = $info['lp_master'];
if($lp_master==null){
	$lp_master="MASTER";
	$trader="INVALID_".$trader;
	}


$sql1="INSERT INTO userpro (id,fname,emel,phone,pwd,akaun,aktif) values('$aff_id','$fname','$emel','$phone','$pwd','MEMBER','Y')";
//$sql1="INSERT INTO userpro (id,emel,pwd,akaun,aktif) values('$aff_id','$emel','$pwd','MEMBER','Y')";
$result=mysqli_query($conn,$sql1);// or die(mysqli_error());


if($result){
echo ("<script LANGUAGE='JavaScript'>window.alert('Registered.');window.location.href='page_new_register.php';</script>");

//letak dalam ni kalau tak dia masuk dalam affiliate dia main tipu ar
$sql2="INSERT INTO wallet (id,walletb,earning) values('$aff_id','0','0')";
$result2=mysqli_query($conn,$sql2);// or die(mysqli_error());

//$sql3="INSERT INTO affiliate (id,aff_id) values('$id','$aff_id')";
$sql3="INSERT INTO affiliate (id,aff_id,lp_master) values('".$id."','".$aff_id."','".$lp_master."')";
$result3=mysqli_query($conn,$sql3);// or die(mysqli_error());

}
//else { echo "ada masalah"; }
echo ("<script LANGUAGE='JavaScript'>window.alert('ID ".$aff_id." Already Registered..');window.location.href='page_new_register.php';</script>");
?>