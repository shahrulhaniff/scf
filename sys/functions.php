<?php

//----------------------------------------------------------------------------------
// get getName
//----------------------------------------------------------------------------------
function getName($id){
	include "database/server.php";
	$s="SELECT name from userpro
		WHERE id='$id'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getWalletb
//----------------------------------------------------------------------------------
function getWalletb($id){
	include "database/server.php";
	$s="SELECT walletb from wallet
		WHERE id='$id'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getWalletc
//----------------------------------------------------------------------------------
function getWalletc($id){
	include "database/server.php";
	$s2="SELECT walletc from wallet
		WHERE id='$id'
		";
	$r2=mysqli_query($conn,$s2);
	$row2=mysqli_fetch_row($r2);

	if ($row2[0]!=""){
		return $row2[0];
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get getDownline
//----------------------------------------------------------------------------------
function getDownline($id){
	include "database/server.php";
	$s="SELECT count(aff_id) from affiliate
		WHERE id='$id'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getTotalInvest
//----------------------------------------------------------------------------------
function getTotalInvest($id){
	include "database/server.php";
	$s="SELECT SUM(amount) from invest
		WHERE id='$id'
		AND stat='Active'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getPortfolioActive
//----------------------------------------------------------------------------------
function getPortfolioActive($id){
	include "database/server.php";
	$s="SELECT count(sn) from invest
		WHERE id='$id'
		AND stat='Active'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get getTotalPlan
//----------------------------------------------------------------------------------
function getTotalPlan($id){
	include "database/server.php";
	$s="SELECT count(sn) from invest
		WHERE id='$id'
		";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get getDayJoin XXXXXXXX
//----------------------------------------------------------------------------------
function getDayJoin($id){
	include "database/server.php";
    date_default_timezone_set('Asia/Kuala_Lumpur');
	$s="SELECT created_date from userpro
		WHERE id='$id'
		";
	$data = mysqli_query($conn,$s);
	$info = mysqli_fetch_array( $data );

	if ($info>0){
	$date1  = date("Y-m-d");
	$start  =  $info['created_date'];
	$date2 = date("Y-m-d", strtotime($start));
	//echo $date1 ;
	//echo "<br>";
	//echo $date2 ;
	//echo "<br>";
	$date1=date_create($date1);
	$date2=date_create($date2);
	$diff=date_diff($date1,$date2);
	$dj =  $diff->format("%a");
	echo $dj;
		return $dj;
		
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get getMinInvest
//----------------------------------------------------------------------------------
function getMinInvest($value){
	include "database/server.php";
	$s="SELECT mininv from masterctrl ORDER BY created_date DESC LIMIT 1";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get getMinWD
//----------------------------------------------------------------------------------
function getMinWD($value){
	include "database/server.php";
	$s="SELECT minwd from masterctrl ORDER BY created_date DESC LIMIT 1";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return $row[0];
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getPlan
//----------------------------------------------------------------------------------
function getPlan(){
	include "database/server.php";
	$s="SELECT planroi,planday,created_date,planname,mininv from masterctrl ORDER BY created_date DESC LIMIT 1 ";
	$r=mysqli_query($conn,$s);
	$row=mysqli_fetch_row($r);

	if ($row[0]!=""){
		return array ($row[0], $row[1],$row[2],$row[3],$row[4]);
	}
	else{
		return null;
	}
}

//----------------------------------------------------------------------------------
// get affiliateLV1
//----------------------------------------------------------------------------------
function getAffiliateLV1($id){
	include "database/server.php";
	$sql3="SELECT id FROM affiliate WHERE aff_id='$id'";
	$data3 = mysqli_query($conn,$sql3) or die(mysqli_error());
	$info3 = mysqli_fetch_array( $data3 );
	$affLV1 = $info3['id'];
	return $affLV1;
}
//----------------------------------------------------------------------------------
// refreshPortf
//----------------------------------------------------------------------------------
function refreshPortf($id4rp){
include "database/server.php";



$done = "clean";
$dataRP = mysqli_query($conn,"SELECT * FROM invest WHERE id='$id4rp' ORDER BY created_date ASC") or die(mysqli_error());
while($infoRP = mysqli_fetch_array( $dataRP )) {

date_default_timezone_set('Asia/Kuala_Lumpur');

$dataWALLET = mysqli_query($conn,"SELECT walletb FROM wallet WHERE id='$id4rp'") or die(mysqli_error());
$infoWALLET = mysqli_fetch_array( $dataWALLET );
//$walletb  = $infoWALLET['walletb'];

$SN   	  = $infoRP['sn'];
$planroi  = $infoRP['planroi'];
$planday  = $infoRP['planday'];
$amount   = $infoRP['amount'];
$days     = $planday * 86400;

$income   = (($amount*$planroi)/100);  
$income   = bcdiv($income,1,2);
$amount   = bcdiv($amount,1,2);
$walletb = $infoWALLET['walletb'] + $income ;

$dateNow  = date("Y-m-d H:i:s");

$current  = strtotime($dateNow);
$start    = strtotime($infoRP['created_date']);
$end      = $start + $days;

$progress = (($current - $start) / ($end - $start)) * 100;
$progress = bcdiv($progress,1,2);


if ($progress >= 100){
	$stat 	  = $infoRP['stat'];
	if($stat!="Completed"){
		$result = mysqli_query($conn,"UPDATE invest set stat = 'Completed' WHERE id = '$id4rp' AND sn='$SN'"); 
		if($result){ mysqli_query($conn,"UPDATE wallet set walletb = '".$walletb."' WHERE id = '$id4rp'"); }
		$done = "updated";
		}
}
}
return $done;
//return $walletb;
}
//----------------------------------------------------------------------------------
// refreshAll
//----------------------------------------------------------------------------------
//function refreshAll(){ }

//----------------------------------------------------------------------------------
// get cekAktifTak
//----------------------------------------------------------------------------------
function cekAktifTak($id){
	include "database/server.php";
	$sql5="SELECT stat FROM invest WHERE id='$id' AND stat='Active' LIMIT 1";
	$data5 = mysqli_query($conn,$sql5) or die(mysqli_error());
	$info5 = mysqli_fetch_array( $data5 );
	$statu = $info5['stat'];

	if ($statu=="Active"){
		return $statu;
	}
	else{
		return null;
	}
}
//----------------------------------------------------------------------------------
// get getRow4date
//----------------------------------------------------------------------------------
function getRow4date($tarikh){
	include "database/server.php";
	$sql5=" SELECT 
			count(invest.created_date) AS berapa_rowspan
			FROM invest , userpro
			WHERE invest.id = userpro.id
            AND invest.created_date LIKE '$tarikh%'
		";
	$data5 = mysqli_query($conn,$sql5) or die(mysqli_error());
	$info5 = mysqli_fetch_array( $data5 );
	$berapa_rowspan = $info5['berapa_rowspan'];

		return $berapa_rowspan;
	
}
//----------------------------------------------------------------------------------
// get checkactivity
//----------------------------------------------------------------------------------
function checkactivity($tarikh){
	include "database/server.php";
	$wujud="N";
	$data6 = mysqli_query($conn,"
					SELECT 
					userpro.id, 
					userpro.fname, 
					userpro.emel, 
					userpro.akaun, 
					invest.amount as amounti, 
					invest.planroi, 
					invest.planday, 
					invest.created_date, 
					invest.stat as stati
					
					FROM invest , userpro
					
					WHERE invest.id = userpro.id
					") or die(mysqli_error());
					
	while($info6 = mysqli_fetch_array( $data6 )) {

	$created_date = $info6['created_date'];
	$created_date2x = date("Y-m-d", strtotime($created_date));
	if($created_date2x==$tarikh){
		$wujud="Y";
	}
	}
	
	return $wujud;
}


?>