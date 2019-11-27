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
 $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Invoice Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Invoice Header -->

    <!-- Invoice Block -->
    <div class="block">
        <!-- Invoice Title -->
        <div class="block-title">
            <h2>Contact Us <small>#0101234567</small></h2>
        </div>
        <!-- END Invoice Title -->

        <!-- Invoice Info -->
        <div class="row block-section">
            <!-- Company Info -->
            <div class="col-sm-4 col-lg-3">
                <div class="well">
                    <h2><strong>Company</strong></h2>
                    <address>
                        Address<br>
                        Town/City<br>
                        Region, Zip/Postal Code<br>
                        <i class="fa fa-phone"></i> (000) 000-0000
                    </address>
                </div>
            </div>
            <!-- END Company Info -->

            <!-- Client Info -->
            <div class="col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 text-right">
                <div class="well">
                    <h2><strong>Client</strong></h2>
                    <address>
                        <?=$_SESSION['USER']?><br>
                        <?=$_SESSION['USER_TYPE']?><br>
                    </address>
                </div>
            </div>
            <!-- END Client Info -->
        </div>
        <!-- END Invoice Info -->

        <!-- Message -->
        <div class="alert alert-success text-center">
            <h2><strong>Thank you for your business <i class="fa fa-smile-o"></i></strong></h2>
            <p>We will be happy to work together again in the future!</p>
        </div>
        <!-- END Message -->

       
    </div>
    <!-- END Invoice Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>