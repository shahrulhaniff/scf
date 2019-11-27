<?php
session_start();
include "database/server.php";

$lp_id = $_SESSION['USER'];
$sn = $_POST['sn'];
$id = $_POST['id'];
$amount = $_POST['amount'];
$walletc = $_POST['walletc'];


$sql="SELECT walletc from wallet WHERE id='".$lp_id."'";
$data = mysqli_query($conn,$sql);
$info = mysqli_fetch_array( $data );
$walletc = $info['walletc'];

$walletc=$walletc-$amount;

$sqlUP="UPDATE wallet set walletc = '".$walletc."' WHERE id='".$lp_id."'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error($conn));

$sqlUP2="UPDATE wd set stat = 'Completed' WHERE id='".$id."' AND sn='".$sn."'";
$resultUP2=mysqli_query($conn,$sqlUP2) or die(mysqli_error($conn));

//takyah sebab dah tolak masa request wd
// $sqlUP2="UPDATE wd set stat = 'Completed' WHERE id='".$id."' AND sn='".$sn."'";
// $resultUP2=mysqli_query($conn,$sqlUP2) or die(mysqli_error());

if(($resultUP)&&($resultUP2)){
echo ("<script LANGUAGE='JavaScript'>window.alert('Paid to ".$id."');window.location.href='page_pay_master.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_pay_master.php';</script>"); }

?>