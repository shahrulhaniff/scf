<?php
include "database/server.php";

$id = $_POST['id'];
$amount= $_POST['amount'];
$walletb = $_POST['walletb'];
$walletb = $walletb - $amount;
$pwd= $_POST['pwd'];

$data = mysqli_query($conn,"SELECT count(sn) as mysn FROM invest WHERE id='$id'") or die(mysqli_error());
$info = mysqli_fetch_array( $data );
$sn = $info['mysn'];
$sn=$sn+1;

$data2 = mysqli_query($conn,"SELECT * FROM masterctrl ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
$planroi = $info2['planroi'];
$planday = $info2['planday'];
	
$sql1="INSERT INTO invest (sn,id,amount,planroi,planday,stat) values('$sn','$id','$amount','$planroi','$planday','Active')";
$result=mysqli_query($conn,$sql1);// or die(mysqli_error());

if($result){

$sqlUP="UPDATE wallet 
		set walletb = '$walletb'
		WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
			
			
	if($resultUP){
	
	//cek siapa affiliate level 1 dia dapat 8% bonus
	$sql3="SELECT id FROM affiliate WHERE aff_id='$id'";
	$data3 = mysqli_query($conn,$sql3) or die(mysqli_error());
	$info3 = mysqli_fetch_array( $data3 );
	
	$bonus8 = ($amount*(8/100));
	$lapan = $info3['id'];
	
	if($lapan!=""){
		//echo "ada :".$lapan."<br>";
		
		//[1]cek dulu lapan aktif tak
		//[2]refresh dulu
		$id4rp = $lapan;
		include "refresh_portfolio.php";
		//[3]pastu cek
		$sql5="SELECT stat FROM invest WHERE id='$lapan' AND stat='Active' LIMIT 1";
		$data5 = mysqli_query($conn,$sql5) or die(mysqli_error());
		$info5 = mysqli_fetch_array( $data5 );
	
		$statu = $info5['stat'];
		if ($statu=="Active"){
		//amik value wallet kalau ada org atas utk bagi bonus
		$sql4="SELECT walletb FROM wallet WHERE id='$lapan'";
		$data4 = mysqli_query($conn,$sql4) or die(mysqli_error());
		$info4 = mysqli_fetch_array( $data4 );
	
		$wallet8 = $info4['walletb'];
		//echo $wallet8;
		$wallet8 = $wallet8 + $bonus8;
		echo $wallet8;
		
		$sqlUP8="UPDATE wallet 
		set walletb = '$wallet8'
		WHERE id = '$lapan'";
		$resultUP8=mysqli_query($conn,$sqlUP8) or die(mysqli_error());
		
		if ($resultUP8){
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
		}
		}
		else {
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
		}
	}
		else {
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
		}
	
	
	}
	else { echo ("<script LANGUAGE='JavaScript'>window.alert('Invest fail to update wallet');window.location.href='page_invest.php';</script>"); }
//echo ("<script LANGUAGE='JavaScript'>window.alert('Invest Success.');window.location.href='page_invest.php';</script>");
}
else { echo "error"; }

?>