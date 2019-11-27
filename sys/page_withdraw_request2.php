<?php

include "database/server.php";

$id = $_POST['id'];
$amount= $_POST['amount'];
//$pwd= $_POST['pwd'];
$walletb = $_POST['walletb'];
$walletb = $walletb - $amount;

$data = mysqli_query($conn,"SELECT count(sn) as mysn FROM wd WHERE id='$id'") or die(mysqli_error());
         
$info = mysqli_fetch_array( $data );
$sn = $info['mysn'];
$sn=$sn+1;

	
$sql1="INSERT INTO wd (sn,id,amount,stat) values('$sn','$id','$amount','Processing')";
$result=mysqli_query($conn,$sql1) or die(mysqli_error());

					
if($result){
	
$sqlUP="UPDATE wallet 
		set walletb = '$walletb'
		WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
			
			
	if($resultUP){
	echo ("<script LANGUAGE='JavaScript'>window.alert('Widthrawal request success!');window.location.href='page_withdraw_request.php';</script>");
	exit();
			
	}else { echo ("<script LANGUAGE='JavaScript'>window.alert('Widthrawal fail to update wallet');window.location.href='page_withdraw_request.php';</script>"); }
	
//echo ("<script LANGUAGE='JavaScript'>window.alert('Invest Success.');window.location.href='page_invest.php';</script>");
}
else { echo "error"; }

?>