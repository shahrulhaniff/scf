									<?php
									date_default_timezone_set('Asia/Kuala_Lumpur');
									$dateNow  = date("Y-m-d H:i:s");
									$current  = strtotime($dateNow);
									$days     = $ary_planday * 86400;
									$payday      = $current + $days;
									$payday = date('d/m/Y', $payday);
									?>

					<div class="widget">
                        <div class="widget-image widget-image-xs">
                            <img src="img/bg5.gif" alt="image" width="150%">
                            <div class="widget-image-content">
                                <h2 class="widget-heading text-light"><strong><?=$ary_planname?></strong></h2>
								<h3 class="widget-heading text-light">100USD <!--<i class="hi hi-arrow-right"></i>-->GET <?=$ary_planroi?>USD</h3>
                                <h3 class="widget-heading text-light"><?=$ary_planroi?>% Profit</h3>
								<h5 class="widget-heading text-light">PAYOUT DATE <i class="hi hi-arrow-right"></i> <?=$payday?></h5>
								<h5 class="widget-heading text-light">MINIMUM INVESTMENT <i class="hi hi-arrow-right"></i> $<?=$ary_mininv?></h5>
                            </div>
                        </div>
                        <div class="widget-content widget-content-full">
                            <!--<table class="table table-striped table-borderless remove-margin">
                                <tbody>
                                    <tr>
                                        <td><?=$ary_planday?> Days</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted"></span></td>
                                    </tr>
                                    <tr>
                                        <td>ESTIMATE PAYOUT DATE</td>
                                        <td class="text-center" style="width: 80px;"><span class="text-muted"><?=$payday?></span></td>
                                    </tr>
                                    
                                </tbody>
                            </table> -->
                        </div>
                    </div>