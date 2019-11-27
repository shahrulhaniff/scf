<?php
	session_start();
	include "database/server.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
if($_SESSION['USER_TYPE']=="MEMBER"){ include 'inc/config.php'; }
if($_SESSION['USER_TYPE']=="MASTER"){ include 'inc/config_master.php';  }
if($_SESSION['USER_TYPE']=="LP"){ include 'inc/config_LP.php';  }
$template['header_link'] = 'TRANSFER'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Portfolio</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li><a href="">Portfolio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->


    <!-- Datatables Block -->
    <!-- Datatables is initialized in js/pages/uiTables.js -->
    <div class="block full">
        <div class="block-title">
            <h2>Portfolio Table</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Investment Plan</th>
                        <th>Finance Plan (USDT)</th>
                        <th>ROI %</th>
                        <th style="width: 25%;">Progress</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text'] = "Active";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text'] = "On hold..";
                    $labels['2']['class'] = "label-danger";
                    $labels['2']['text'] = "Disabled";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text'] = "Pending..";
                    ?>
                    <?php 
					$i=1;

					$data = mysqli_query($conn,"SELECT * FROM invest WHERE id='$_SESSION[USER]' ORDER BY created_date DESC") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						
						date_default_timezone_set('Asia/Kuala_Lumpur');
$dataWALLET = mysqli_query($conn,"SELECT walletb FROM wallet WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$infoWALLET = mysqli_fetch_array( $dataWALLET );
$walletbw  = $infoWALLET['walletb']; 
						
						$SN   = $info['sn'];
						$amount   = $info['amount'];
						$planroi  = $info['planroi'];
						$planname  = $info['planname'];
						$planday  = $info['planday'];
						$days     = $planday * 86400;
						
						$income   = (($amount*$planroi)/100);
						$income   = bcdiv($income,1,2);
						$amount   = bcdiv($amount,1,2);
						$walletbw = $walletbw + $income ;
						$dateNow  = date("Y-m-d H:i:s");
						
						$current  = strtotime($dateNow);
						$start    = strtotime($info['created_date']);
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
							$stat = $info['stat']; 
							$active="active"; 
						}
						if ($progress >= 100){
							$active = null;
							$progress = "100";
							$stat 	  = $info['stat'];
							$la="success";
							$la2="star";
							//$stat     = "Completed";
							if($stat!="Completed"){ 
							 mysqli_query($conn,"UPDATE invest set stat = 'Completed' WHERE id = '$_SESSION[USER]' AND sn='$SN'"); 
							 mysqli_query($conn,"UPDATE wallet set walletb = '".$walletbw."' WHERE id = '$_SESSION[USER]'"); }
							$la       = "info";
							$la2      = "check";
							$color    ="progress-bar-primary";
						}
					?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><strong>Plan <?=$planname?>:</strong> | $100USD > $<?=$planroi?>USD</td>
                        <td><b>$<?=$amount?></b>USDT <i class="fa fa-arrow-right"></i> <b>$<?=$income?></b>USDT</td>
                       
                        <td><?=$planroi?>%</td>
                        <td>
							<div class="progress progress-striped <?=$active?>">
							<div class="progress-bar <?=$color?>" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress?>%"><?=$progress?>%</div>
							</div>
						</td>
                        <td>
							
							<?php 
								if($progress<"100"){
									?><button class="btn btn-effect-ripple btn-sm btn-<?=$la?>"><i class="fa fa-<?=$la2?>"></i><?=$stat?></button><?php } 
								if($progress=="100"){
									?><a href="page_withdraw_request.php"><button type="submit" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-check"></i>Widthraw Request</button></a> <?php
									?><a href="page_invest.php"><button type="submit" class="btn btn-effect-ripple btn-sm btn-info" title="Plan Today"><i class="fa fa-check"></i>Re-invest</button></a><?php
								} 
							?>
						</td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>