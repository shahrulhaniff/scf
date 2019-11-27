<?php
include "database/server.php";
include "functions.php";

$id = $_POST['id'];
$amount= $_POST['amount'];
$walletb = $_POST['walletb'];
$walletb = $walletb - $amount;
//$pwd= $_POST['pwd'];

$data = mysqli_query($conn,"SELECT count(sn) as mysn FROM invest WHERE id='$id'") or die(mysqli_error());
$info = mysqli_fetch_array( $data );
$sn = $info['mysn'];
$sn=$sn+1;

$data2 = mysqli_query($conn,"SELECT * FROM masterctrl ORDER BY created_date DESC LIMIT 1") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
$planroi = $info2['planroi'];
$planday = $info2['planday'];
$planname = $info2['planname'];
	
$sql1="INSERT INTO invest (sn,id,amount,planname,planroi,planday,stat) values('$sn','$id','$amount','$planname','$planroi','$planday','Active')";
$result=mysqli_query($conn,$sql1);// or die(mysqli_error());

if($result){

$sqlUP="UPDATE wallet 
		set walletb = '$walletb'
		WHERE id = '$id'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
			
			
	if($resultUP){
	
	//[1]cek siapa affiliate level 1 dia dapat 8% bonus
	/*$sql3="SELECT id FROM affiliate WHERE aff_id='$id'";
	$data3 = mysqli_query($conn,$sql3) or die(mysqli_error());
	$info3 = mysqli_fetch_array( $data3 );
	$lapan = $info3['id']; */
	$lapan = getAffiliateLV1($id);
	
	$bonus8 = ($amount*(8/100));
	$bonus2 = ($amount*(2/100));
	$bonus1 = ($amount*(1/100));
	
	if($lapan!=""){
		//echo "ada :".$lapan."<br>";
		
		//[2]cek dulu lapan aktif tak,tp refresh dulu
		//$id4rp = $lapan;
		//include "refresh_portfolio.php";
		$refr = refreshPortf($lapan);
		//[3]pastu cek
		/*$sql5="SELECT stat FROM invest WHERE id='$lapan' AND stat='Active' LIMIT 1";
		$data5 = mysqli_query($conn,$sql5) or die(mysqli_error());
		$info5 = mysqli_fetch_array( $data5 );
		$statu = $info5['stat']; */
		$statu8 = cekAktifTak($lapan);
		
		if ($statu8 =="Active"){
		//[4] kalau aktif baru amik value wallet kalau ada org atas utk bagi bonus
		/*$sql4="SELECT walletb FROM wallet WHERE id='$lapan'";
		$data4 = mysqli_query($conn,$sql4) or die(mysqli_error());
		$info4 = mysqli_fetch_array( $data4 ); */
		
		//$wallet8 = $info4['walletb'];
		$wallet8 = getWalletb($lapan);
		//echo $wallet8;
		$wallet8 = $wallet8 + $bonus8;
		//echo $wallet8;
		
		$sqlUP8="UPDATE wallet 
		set walletb = '$wallet8'
		WHERE id = '$lapan'";
		$resultUP8=mysqli_query($conn,$sqlUP8) or die(mysqli_error());
		
		if ($resultUP8){

			
			$dua = getAffiliateLV1($lapan); //[1] cek siapa affiliate level 1(2) utk org 8% bonus
			if($dua!=""){					//[ ] Kalau ada baru proceed 2-3-4
			$refr2 = refreshPortf($dua); 	//[2] cek dulu lapan aktif tak,tp refresh dulu
			$statu2 = cekAktifTak($dua); 	//[3] pastu cek
			if ($statu2 =="Active"){		//[ ] kalau aktif dulu baru proceed 4
			$wallet2 = getWalletb($dua);	//[4] kalau aktif baru amik value wallet kalau ada org atas utk bagi bonus. tapi ni atas kena aktif dulu baru dia terima
			$wallet2 = $wallet2 + $bonus2;
			$sqlUP2="UPDATE wallet 
			set walletb = '$wallet2'
			WHERE id = '$dua'";
			$resultUP2=mysqli_query($conn,$sqlUP2) or die(mysqli_error());
			
			if ($resultUP2){
				
				
			$satu = getAffiliateLV1($dua);  //[1] cek siapa affiliate level 1(2) utk org 8% bonus
			if($satu!=""){					//[ ] Kalau ada baru proceed 2-3-4
			$refr1 = refreshPortf($satu); 	//[2] cek dulu lapan aktif tak,tp refresh dulu
			$statu1 = cekAktifTak($satu); 	//[3] pastu cek
			if ($statu1 =="Active"){		//[ ] kalau aktif dulu baru proceed 4
			$wallet1 = getWalletb($satu);	//[4] kalau aktif baru amik value wallet kalau ada org atas utk bagi bonus. tapi ni atas kena aktif dulu baru dia terima
			$wallet1 = $wallet1 + $bonus1;
			$sqlUP1="UPDATE wallet 
			set walletb = '$wallet1'
			WHERE id = '$satu'";
			$resultUP1=mysqli_query($conn,$sqlUP1) or die(mysqli_error());
			
			if ($resultUP1){
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
			}
			/* #kalau resultUP1 error */
			else {
				echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
				exit();
			}
			}
			/* #kalau org level 1 tak aktif portfolio */
			else {
				echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
				exit();
			}
			}
			/* #kalau xde org level 3 dpt bonus 1# */
			else {
				echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
				exit();
			}
			}
			/* #kalau resultUP2 error :  xde org level 2 dpt bonus 2# */
			else {
				echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
				exit();
			}
		}
		/* #kalau org level 2 xaktif portfolio*/
			else {
				echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
				exit();
			}
		}
		/* #kalau xde org level 2 */
		else {
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
		}
	}
		/* #kalau resultUP8 error */
		else {
			echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
			exit();
		}
	
	
	}
	/* #kalau org level 1 yang dapat bonus 8 tak aktif portfolio*/
	else {
		echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
		exit();
	}
	}
	/* #kalau org level 1 xde*/
	else {
		echo ("<script LANGUAGE='JavaScript'>window.alert('Investment Active!');window.location.href='page_invest.php';</script>");
		exit();
	}
	
	
}

/* #kalau err resultUP : update wallet# */
	else { echo ("<script LANGUAGE='JavaScript'>window.alert('Invest fail to update wallet');window.location.href='page_invest.php';</script>"); }
	//echo ("<script LANGUAGE='JavaScript'>window.alert('Invest Success.');window.location.href='page_invest.php';</script>");
}
/* #kalau err insert dlm invest# */
else { echo "error"; }

?>