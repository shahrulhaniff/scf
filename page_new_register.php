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
                        <li>User Interface</li>
                        <li>Forms</li>
                        <li><a href="">Validation</a></li>
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
                    <h2>Register Downline</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-register" action="page_new_register2.php" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="register-username" name="id" class="form-control" placeholder="Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="register-email" name="emel" class="form-control" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-6">
                    <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="register-terms" name="register-terms">
                        <span></span>
                    </label>
                    <a href="#modal-terms" data-toggle="modal">Terms</a>
                </div>
                <div class="col-xs-6 text-right">
					<input type="submit" value="submit" name="reguser" class="btn btn-effect-ripple btn-success">
                    <!--<button type="submit" class="btn btn-effect-ripple btn-success"><i class="fa fa-plus"></i> Create Account</button>-->
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
	<?php
$data2 = mysqli_query($conn,"SELECT count(aff_id) as myaff_id FROM affiliate WHERE id='$_SESSION[USER]'") or die(mysqli_error());
$info2 = mysqli_fetch_array( $data2 );
if($info2['myaff_id'] > 0){
?>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
<div class="block">
<!-- Form Validation Title -->
                <div class="block-title">
                    <h2>My Downline</h2>
                </div>
                <!-- END Form Validation Title -->
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Joined</th>
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
					$count = 1;
					$data = mysqli_query($conn,"SELECT * FROM affiliate WHERE id='$_SESSION[USER]'") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
					//if($info['stat'] =='Success' ){ $la="label-success";}
					//if($info['stat'] =='Processing' ){ $la="label-info";}
					?>
                    <tr>
                        <td class="text-center"><?php echo $count; ?></td>
                        <td><strong><?php echo $info['aff_id']; ?></strong></td>
                        <td><?php echo $info['aff_id']; ?></td>
                        <td><?php echo $info['created_date']; ?></td>
                        <!--<td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td> -->
                    </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>
        </div>
</div>
</div>
</div>
<?php } ?>
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<?php include 'inc/template_end.php'; ?>