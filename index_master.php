<?php
	session_start();
	include "database/server.php";
	if (empty($_SESSION['USER'])) { header('Location:login.php'); }
	if($_SESSION['USER_TYPE']=="MEMBER"){ header('Location:index.php');  }
	if($_SESSION['USER_TYPE']=="LP"){ header('Location:index_LP.php');  }
?>
<?php 

include 'inc/config_master.php'; 

$template['header_link'] = 'DASHBOARD CONTROL PANEL'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php include 'functions.php';
//$refreshall  =  refreshAll(); //cronjob
$walletb     =  getWalletb($_SESSION['USER']);
$downline    =  getDownline($_SESSION['USER']);
$TotalInvest =  getTotalInvest($_SESSION['USER']);
$dj   		 =  getDayJoin($_SESSION['USER']);

$plan_array=  getPlan();
$ary_planroi = $plan_array[0];
$ary_planday = $plan_array[1];
$ary_plandte = $plan_array[2];
$ary_planname= $plan_array[3];
$ary_mininv= $plan_array[4];

?>
<!-- Page content -->
<div id="page-content">
    <!-- First Row -->
    <div class="row">
        <!-- Simple Stats Widgets -->
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background">
                        <i class="fa fa-btc text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3">
                        <strong>$<span data-toggle="counter" data-to="<?=$TotalInvest?>"></span></strong>
                    </h2>
                    <span class="text-muted">INVESTMENT</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-success">
                        <i class="gi gi-user text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-success">
                        <strong>+ <span data-toggle="counter" data-to="<?=$downline?>"></span></strong>
                    </h2>
                    <span class="text-muted">DOWNLINES</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-danger">
                        <i class="gi gi-wallet text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-danger">
                        <strong>USD <span data-toggle="counter" data-to="<?=$walletb?>"></span></strong>
                    </h2>
                    <span class="text-muted">WALLETS</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-warning">
                        <i class="fa fa-calendar-o text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-warning">
                        <strong>+ <span data-toggle="counter" data-to="<?=$dj?>"></span></strong>
                    </h2>
                    <span class="text-muted">DAY JOINED</span>
                </div>
            </a>
        </div>
        <!-- END Simple Stats Widgets -->
    </div>
    <!-- END First Row -->

    <!-- Second Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-8">
            <!-- Animation and Auto Slide Carousel Block -->
            <div class="block">
                <!-- Animation and Auto Slide Carousel Title -->
                <div class="block-title">
                    <h2>INVESTMENT PLAN</h2>
                </div>
                <!-- END Animation and Auto Slide Carousel Title -->

                <!-- Animation and Auto Slide Carousel Content -->
                <div class="block-content-full">
                    <!-- <div id="animation-carousel" class="carousel slide remove-margin" data-ride="carousel" data-interval="1500">
                        Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php include "page_plan_today_master_ctrl.php"?>
                            </div>
                            
                        </div>
                        <!-- END Wrapper for slides -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#animation-carousel" data-slide="prev">
                            <span><i class="fa fa-chevron-left"></i></span>
                        </a>
                        <a class="right carousel-control" href="#animation-carousel" data-slide="next">
                            <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                        <!-- END Controls 
                    </div>-->
                </div>
                <!-- END Animation and Auto Slide Carousel Content -->
            </div>
            <!-- END Animation and Auto Slide Carousel Block -->
        </div>
        <div class="col-sm-6 col-lg-4">
            <!-- Stats User Widget -->
            <a href="page_ready_profile.php" class="widget">
                <div class="widget-content border-bottom text-dark">
                    <span class="pull-right text-muted">This week</span>
                    Last Plan
                </div>
                <div class="widget-content border-bottom themed-background-muted">
                    <?php include "page_plan_today2.php"; ?>
                </div>
                <!--<div class="widget-content widget-content-full-top-bottom">
                    <div class="row text-center">
                        <div class="col-xs-6 push-inner-top-bottom border-right">
                            <h3 class="widget-heading"><i class="gi gi-briefcase text-dark push-bit"></i> <br><small>35 Projects</small></h3>
                        </div>
                        <div class="col-xs-6 push-inner-top-bottom">
                            <h3 class="widget-heading"><i class="gi gi-heart_empty text-dark push-bit"></i> <br><small>5.3k Likes</small></h3>
                        </div>
                    </div>
                </div>-->
            </a>
            <!-- END Stats User Widget -->
            <!-- Mini Widgets Row -->
            <div class="row">
                <div class="col-xs-12">
                              <div class="form-group">
                                <div class="col-sm-12">

                                  <div class="input-group mb-md">
                                    <input type="text" class="form-control" id="myInput" value="https://supercryptofinance.com/register.php?trader=<?=$_SESSION['USER']?>">
                                    <div class="input-group-btn">
                                      <button type="button" class="btn btn-primary copy-to-clipboard" tabindex="-1" onclick="myFunction()">Copy</button>
                                    </div>
                                  </div>
                                  <div class='copied'></div>
                                </div>
                              </div>
                </div>
            </div>
            <!-- END Mini Widgets Row -->
        </div>
    </div>
    <!-- END Second Row -->


</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
							<script type="text/javascript">
							function myFunction() {
							  /* Get the text field */
							  var copyText = document.getElementById("myInput");

							  /* Select the text field */
							  copyText.select();
							  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

							  /* Copy the text inside the text field */
							  document.execCommand("copy");

							  /* Alert the copied text */
							  alert("Copied the text: " + copyText.value);
							}
							</script>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>


<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyTimeline.js"></script>
<script>$(function(){ ReadyTimeline.init(); });</script>




<?php include 'inc/template_end.php'; ?>