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
$template['header_link'] = 'FORMS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>INVESTMENT</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Wallet</li>
                        <li><a href="">Investment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Validation Header -->

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>INVEST</h2>
                </div>
                <!-- END Form Validation Title -->
<?php 
$walletb =  getWalletb($_SESSION['USER']);
$mininv = getMinInvest($_SESSION['USER']);
?>
                <!-- Form Validation Form -->
                <form id="form-validation" action="page_invest2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" >Wallet Balance</label>
                        <div class="col-md-6">
                            <input type="text" value="<?=$walletb?>" class="form-control" placeholder="Balance" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="amount">Amount <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="amount" name="amount" class="form-control floatNumberField" placeholder="USDT" step="0.01" min="<?=$mininv?>" max="<?=$walletb?>" step="0.01" autocomplete="off">
                        </div>
                    </div>
					<!--<div class="form-group">
                        <label class="col-md-3 control-label" for="pwd">Security Password <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter your password.."  autocomplete="off">
                        </div>
                    </div>-->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="hidden" name="id" value="<?=$_SESSION['USER']?>">
                            <input type="hidden" name="walletb" value="<?=$walletb?>">
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="Invest">
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

                
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->
<?php
$data2 = mysqli_query($conn,"SELECT count(sn) as mysn FROM invest WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
//$mysn=$info2['mysn'];
if($info2['mysn'] > 0){
?>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<div class="block">
<div class="block-title">
<h2>My Investment</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No.</th>
                        <th>Amount (USDT)</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="width: 2px;"></th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
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
					$data = mysqli_query($conn,"SELECT * FROM invest WHERE id='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					if($info['stat'] =='Active' ){ $la="label-success";}
					if($info['stat'] =='Completed' ){ $la="label-info";}
					?>
                    <tr>
                        <td class="text-center"><?php echo $info['sn']; ?></td>
                        <td><strong><?php echo $info['amount']; ?></strong></td>
                        <td><?php echo $info['created_date']; ?></td>
                        <td><span class="label<?php echo " ".$la; ?>"><?php echo $info['stat']; ?></span></td>
                        <td></td>
                        <!--<td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</div>
</div>
<?php  }
$mysn=$info2['mysn']; 

echo $mysn; 

?>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

<?php if($mysn>30){ ?>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>
<?php } ?>

<?php include 'inc/template_end.php'; ?>