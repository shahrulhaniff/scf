<?php
/*
	$id=2;
	include "database/server.php";
    date_default_timezone_set('Asia/Kuala_Lumpur');
	$s="SELECT created_date from userpro
		WHERE id='$id'
		";
	$data = mysqli_query($conn,$s);
	$info = mysqli_fetch_array( $data );

	$date1  = date("Y-m-d");
		//$current  = strtotime($dateNow);
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

	echo "<br>";
	$amount = "1000";
	$bonus8 = ($amount*(8/100));
	echo $bonus8;
	*/
	
	// $dff = "45056";
	// $dff = number_format((float)$dff, 2, '.', ''); 
	// echo $dff;
	
	include "functions.php";
	$lapan="2";
	$refr = refreshPortf($lapan);
	echo $refr;
	
	/*
	$id="4";
	$lapan = getAffiliateLV1($id);
	echo $lapan;
	*/
	
	// $satu ="kamal002";
	// $statu1 = cekAktifTak($satu);
	// echo $statu1;
	
	// $xdate2 = "2019-11-29";
	// $checkactivity = checkactivity($xdate2);
	// echo $checkactivity;

?>