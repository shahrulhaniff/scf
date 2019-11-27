<!-- Inner Sidebar -->
    <div id="page-content-sidebar">
        <!-- Collapsible People List -->
        <a href="javascript:void(0)" class="btn btn-block btn-effect-ripple btn-primary visible-xs" data-toggle="collapse" data-target="#people-nav">DOWNLINE (<?=$downline?>)</a>
        <div id="people-nav" class="collapse navbar-collapse remove-padding">
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-default pull-right"><i class="fa fa-cog"></i></a>
                    DOWNLINE (<?=$downline?>)
                </h4>
                <ul class="nav-users nav-users-online">
				<?php 
					$sql  = "
						SELECT * FROM affiliate A,userpro U
						WHERE A.id = '$_SESSION[USER]'
						AND U.id = A.aff_id
						";
					$data = mysqli_query($conn,$sql) or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						$aff_id=$info['aff_id'];
						$aff_invest = getTotalInvest($aff_id);
						if($aff_invest==null){ $aff_invest="Inactive Portfolio"; }
					?>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="img/placeholders/avatars/avatar6.jpg" alt="image" class="nav-users-avatar">
                            <span class="label label-success nav-users-indicator">5</span>
                            <span class="nav-users-heading"><?=$aff_id?></span>
                            <span class="text-muted"><?=$aff_invest?></span>
                        </a>
                    </li>
					<?php } ?>
                </ul>
            </div>
            <!--<div class="block-section">
                <h4 class="inner-sidebar-header">
                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-default pull-right"><i class="fa fa-cog"></i></a>
                    Away
                </h4>
                <ul class="nav-users nav-users-away">
                    <li>
                        <a href="javascript:void(0)">
                            <img src="img/placeholders/avatars/avatar14.jpg" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading">Harold Green</span>
                            <span class="text-muted">Product Manager</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="img/placeholders/avatars/avatar15.jpg" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading">Alan George</span>
                            <span class="text-muted">Freelancer</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-default pull-right"><i class="fa fa-cog"></i></a>
                    Offline
                </h4>
                <ul class="nav-users nav-users-offline">
                    <li>
                        <a href="javascript:void(0)">
                            <img src="img/placeholders/avatars/avatar7.jpg" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading">Nathan Moore</span>
                            <span class="text-muted">UX Designer</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="img/placeholders/avatars/avatar16.jpg" alt="image" class="nav-users-avatar">
                            <span class="nav-users-heading">Jason Gomez</span>
                            <span class="text-muted">CEO</span>
                        </a>
                    </li>
                </ul>
            </div>-->
        </div>
        <!-- END Collapsible People List -->
    </div>
    <!-- END Inner Sidebar -->