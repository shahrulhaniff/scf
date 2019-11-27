 <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-vcenter">
                <?php 
					$i=1;
					$data = mysqli_query($conn,"SELECT * FROM invest WHERE id='$_SESSION[USER]' AND stat='Active' ORDER BY created_date ASC") or die(mysqli_error());
					while($info = mysqli_fetch_array( $data )) {
						
						date_default_timezone_set('Asia/Kuala_Lumpur');
						
						
						$SN   = $info['sn'];
						$amount   = $info['amount'];
						$planroi  = $info['planroi'];
						$planday  = $info['planday'];
						$days     = $planday * 86400;
						
						$income   = (($amount*$planroi)/100);
						$income   = bcdiv($income,1,2);
						$amount   = bcdiv($amount,1,2);
						
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
							if($stat!="Completed"){ mysqli_query($conn,"UPDATE invest set stat = 'Completed' WHERE id = '$_SESSION[USER]' AND sn='$SN'"); }
							$la       = "info";
							$la2      = "check";
							$color    ="progress-bar-primary";
						}
					?>
                    <tr>
                        <td>
							<div class="progress progress-striped <?=$active?>">
								<div class="progress-bar <?=$color?>" role="progressbar" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$progress?>%"><?=$progress?>%</div>
							</div>
						</td>
                    </tr>
				<?php $i++; } ?>
            </table>
        </div>