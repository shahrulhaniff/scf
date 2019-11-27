<?php
include "database/server.php";
include "functions.php";

$SN = $_GET['SN'];
$ID = $_GET['ID'];
$AM = $_GET['AM'];
$balance = getWalletb($ID);
$upb = $balance + $AM;

$sql="DELETE FROM wd  WHERE sn='".$SN."' AND id='".$ID."'";
$result=mysqli_query($conn,$sql);

if($result){
	
$sqlUP="UPDATE wallet set walletb = '".$upb."' WHERE id='".$ID."' ";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
	
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_withdraw_request.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_withdraw_request.php';</script>"); }

?>