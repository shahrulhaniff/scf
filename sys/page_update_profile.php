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

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header hijau">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Form Validation</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Control Panel</li>
                        <li>Profile</li>
                        <li><a href="">Update</a></li>
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
                    <h2>Update Profile Information</h2>
                </div>
                <!-- END Form Validation Title -->


<?php
	$sql="SELECT * from userpro WHERE id='$_SESSION[USER]' ";
	$data = mysqli_query($conn,$sql);
	$info = mysqli_fetch_array( $data );
	$id = $info['id'];
	$name = $info['fname'];
	$emel = $info['emel'];
	$address = $info['address'];
	$phone = $info['phone'];
?>



                <!-- Form Validation Form -->
                <form id="form-validation" action="page_update_profile2.php" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Username <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" name="id" class="form-control" placeholder="Choose a nice username.." value="<?=$id?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" name="emel" class="form-control" placeholder="Enter your valid email.." value="<?=$emel?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="fname">Full Name <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your full name" value="<?=$name?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="address">Address <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" value="<?=$address?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="phone">Phone Number <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your address" value="<?=$phone?>">
                        </div>
                    </div>
					
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" class="btn btn-effect-ripple btn-primary" value="UPDATE">
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

                <!-- Terms Modal -->
                <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center"><strong>Terms and Conditions</strong></h3>
                            </div>
                            <div class="modal-body">
                            <?php include "terms.php";?>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">I've read them!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<?php include 'inc/template_end.php'; ?>