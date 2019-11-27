<?php
									date_default_timezone_set('Asia/Kuala_Lumpur');
									$dateNow  = date("Y-m-d H:i:s");
									$current  = strtotime($dateNow);
									$days     = $ary_planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y', $payday);
									?>

<div class="widget">
						<!--
                        <div class="widget-image widget-image-xs">
                            <img src="img/bg5.gif" alt="image" width="150%">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong>Plan Today</strong></h2>
                                <h2 class="widget-heading text-light"><?=$ary_planroi?>% Profit</h2>
                                <h1 class="widget-heading text-light"><strong><?=$ary_planday?> Days</strong></h1>
                            </div>
                        </div> -->
						
						<div class="widget-image widget-image-xs">
                            <img src="img/bg5.gif" alt="image" width="150%">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong><?=$ary_planname?></strong></h2>
								<h3 class="widget-heading text-light">100USD <!--<i class="hi hi-arrow-right"></i>-->GET <?=$ary_planroi?>USD</h3>
                                <h2 class="widget-heading text-light"><?=$ary_planroi?>% Profit</h2>
								<h5 class="widget-heading text-light">PAYOUT DATE <i class="hi hi-arrow-right"></i> <?=$payday?></h5>
                            </div>
                        </div>
						
						
                        <div class="widget-content widget-content-full">
                            <table class="table table-striped table-borderless remove-margin">
                                <tbody>
                                    <tr>
                                        <td>
										<div id="hidDiv2">
										<button onclick="hidenshow()" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										100 <i class="hi hi-arrow-right"></i> <?=$ary_planroi?>
										</div>
										
										<div id="hidDiv" style="display: none">
										<form action="update_plan.php" method="POST">
										100 <i class="hi hi-arrow-right"></i><input type="number" value="<?=$ary_planroi?>" name="planroi" required>
										<button type="submit" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										<button onclick="hidenshow()" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-times"></i>Cancel</button>
										</form>
										</div>

<!--<form action="" method="POST"><input type="submit" name="editroi"></form>-->
<?php
//if (isset($_POST['editroi'])) {
//   echo "copy 1.php tapi tak jadi";
//} // CLOSE ISSET
?> 
										</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted">GUARANTEED</span></td>
                                    </tr>
                                    <tr>
                                        <td>
										
										<div id="dday2">
										<button onclick="hnsDay()" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										<?=$ary_planday?> Days
										</div>
										
										<div id="dday" style="display: none">
										<form action="update_days.php" method="POST">
										<input type="number" value="<?=$ary_planday?>" min="1" name="planday" required> Days
										<button type="submit" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										<button onclick="hnsDay()" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-times"></i>Cancel</button>
										</form>
										</div>
										
										</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted"></span></td>
                                    </tr>
									
									
                                    <tr>
                                        <td>
										
										<div id="MI2">
										<button onclick="hnsMI()" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										<?=$ary_mininv?> Minimum Investment
										</div>
										
										<div id="MI" style="display: none">
										<form action="update_MI.php" method="POST">
										<input type="number" value="<?=$ary_mininv?>" min="1" name="MI" required>
										<button type="submit" class="btn btn-effect-ripple btn-sm btn-info"><i class="fa fa-pencil"></i>Edit</button>
										<button onclick="hnsMI()" class="btn btn-effect-ripple btn-sm btn-danger"><i class="fa fa-times"></i>Cancel</button>
										</form>
										</div>
										
										</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted"></span></td>
                                    </tr>
									
									
                                    <!--<tr>
                                        <td>ESTIMATE PAYOUT DATE</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted"><?=$payday?></span></td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
					
<script>
function hidenshow() {
  var x = document.getElementById("hidDiv");
  var y = document.getElementById("hidDiv2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>			
<script>
function hnsDay() {
  var x = document.getElementById("dday");
  var y = document.getElementById("dday2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
function hnsMI() {
  var x = document.getElementById("MI");
  var y = document.getElementById("MI2");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
