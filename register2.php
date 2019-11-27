<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "database/server.php";
$trader = $_POST['trader'];
$id = $_POST['id'];
$fname= $_POST['emel'];
$emel= $_POST['emel'];
$phone= $_POST['id'];
$pwd= $_POST['pwd'];
	
	
$data = mysqli_query($conn,"SELECT * FROM affiliate WHERE aff_id='".$trader."'") or die(mysqli_error());
$info = mysqli_fetch_array( $data );
$lp_master = $info['lp_master'];
if($lp_master==null){
	$lp_master="MASTER";
	$trader="INVALID_".$trader;
	}

$sql1="INSERT INTO userpro (id,fname,emel,phone,pwd,akaun,aktif) values('".$id."','".$fname."','".$emel."','".$phone."','".$pwd."','MEMBER','Y')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
if($result){
	
$sql2="INSERT INTO wallet (id,walletb,walletc,earning) values ('".$id."','0','0','0')";
$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
if($result2){
	
$sql3="INSERT INTO affiliate (id,aff_id,lp_master) values('".$trader."','".$id."','".$lp_master."')";
$result3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
if($result3){
echo ("<script LANGUAGE='JavaScript'>window.alert('Registered.');window.location.href='login.php';</script>");
}
}

}
else { echo "ada masalah"; }

?>