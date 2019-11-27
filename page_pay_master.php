<?php
	session_start();
	include "database/server.php";
	include "functions.php";
	if (empty($_SESSION['USER'])) {
	header('Location:login.php'); }
?>
<?php 
$walletb     =  getWalletb($_SESSION['USER']); 
$walletc     =  getWalletc($_SESSION['USER']);
?>
<?php include 'inc/config_LP.php'; $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>


<!-- Page content -->
<div id="page-content">
    <!-- Blank Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Report</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>MASTER</li>
                        <li><a href="">Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->
	
    <div class="row">
	<div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini themed-background-dark-flat">
                    <span class="pull-right text-muted">-20%</span>
                    <strong class="text-light-op">Pay Wallet</strong>
                </div>
                <div class="widget-content themed-background-flat clearfix">
                    <div class="widget-icon pull-right">
                        <i class="fa fa-btc text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-light"><strong><?=$walletc?></strong></h2>
                    <span class="text-light-op">Balance</span>
                </div>
            </a>
        </div>
        </div>
	
	<?php include "page_pay_master1.php"; ?>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/uiTables.js"></script>
<script>$(function(){ UiTables.init(); });</script>

<?php include 'inc/template_end.php'; ?>