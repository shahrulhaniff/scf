<?php
//nak panggil file ni declare value $id4rp dulu
$i=1;
$dataRP = mysqli_query($conn,"SELECT * FROM invest WHERE id='$id4rp' ORDER BY created_date ASC") or die(mysqli_error());
while($infoRP = mysqli_fetch_array( $dataRP )) {

date_default_timezone_set('Asia/Kuala_Lumpur');

$SN   = $infoRP['sn'];
$amount   = $infoRP['amount'];
$planroi  = $infoRP['planroi'];
$planday  = $infoRP['planday'];
$days     = $planday * 86400;

$income   = (($amount*$planroi)/100);
$income   = bcdiv($income,1,2);
$amount   = bcdiv($amount,1,2);

$dateNow  = date("Y-m-d H:i:s");

$current  = strtotime($dateNow);
$start    = strtotime($infoRP['created_date']);
$end      = $start + $days;

$progress = (($current - $start) / ($end - $start)) * 100;
$progress = bcdiv($progress,1,2);
$color    ="progress-bar-danger";

if (($progress >= 0 )&&($progress <= 20)){ $color="progress-bar-danger"; }
if (($progress >= 21)&&($progress <= 40)){ $color="progress-bar-warning"; }
if (($progress >= 41)&&($progress <= 70)){ $color="progress-bar-info"; }
if (($progress >= 61)&&($progress <= 80)){ $color="progress-bar-success"; }
if (($progress >= 81)&&($progress <= 99)){ $color="progress-bar-success"; }

if ($progress < 100){ 
$la="success"; 
$la2="star"; 
$stat = $infoRP['stat']; 
$active="active"; 
}
if ($progress >= 100){
$active = null;
$progress = "100";
$stat 	  = $infoRP['stat'];
$la="success";
$la2="star";
//$stat     = "Completed";
if($stat!="Completed"){ mysqli_query($conn,"UPDATE invest set stat = 'Completed' WHERE id = '$id4rp' AND sn='$SN'"); }
$la       = "info";
$la2      = "check";
$color    ="progress-bar-primary";
} 
/* ?>
<div class="progress progress-striped <?=$active?>">
<div class="progress-bar <?=$color?>" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress?>%"><?=$progress?>%</div>
</div>
<?php */
$i++; } ?>