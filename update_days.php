<?php
include "database/server.php";

$sql="SELECT * from masterctrl ORDER BY created_date DESC LIMIT 1";
$data = mysqli_query($conn,$sql);
$info = mysqli_fetch_array( $data );

$sn = $info['sn'];
$mininv = $info['mininv'];
$minwd = $info['minwd'];
$planroi = $info['planroi'];
//$planday = $info['planday'];
$planday = $_POST['planday'];

$sql1="INSERT INTO masterctrl (mininv,minwd,planroi,planday) values('$mininv','$minwd','$planroi','$planday')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

if($result){
echo ("<script LANGUAGE='JavaScript'>window.location.href='index_master.php';</script>");
exit();

}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Network error.. Please Try Again.');window.location.href='index_master.php';</script>"); }
/*
$sqlUP="UPDATE masterctrl set planday = '$fname'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
if($resultUP){
echo ("<script LANGUAGE='JavaScript'>window.alert('Profile Updated!');window.location.href='page_update_profile.php';</script>");
exit();

}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_update_profile.php';</script>"); }
*/
?>