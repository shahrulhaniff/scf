<?php

$data = mysqli_query($conn,"
					SELECT 
					userpro.id, 
					userpro.fname, 
					userpro.emel, 
					userpro.akaun, 
					invest.amount as amounti, 
					invest.planroi, 
					invest.planday, 
					invest.created_date, 
					invest.stat as stati
					
					FROM invest , userpro
					
					WHERE invest.id = userpro.id
					") or die(mysqli_error());
					$tr="nope";
					while($info = mysqli_fetch_array( $data )) {
					if($info['stati'] =='Active' )   { $la="label-success";}
					if($info['stati'] =='Completed' ){ $la="label-info";}
					if($info['stati'] =='Processing' ){ $la="label-info";}
					
					$created_date = $info['created_date'];
					$created_date2 = date("d-m-Y", strtotime($created_date));
					$created_date2x = date("Y-m-d", strtotime($created_date));
					$depo_id = $info['id'];
					$stati = $info['stati'];
					$fname = $info['fname'];
					$akaun = $info['akaun'];
					//$emel = $info['emel'];
					//$walletb = $info['walletb'];
					$amounti = $info['amounti'];
					//$amountwd = $info['amountwd'];
					if($created_date2x==$xdate2){
					?>
					<?php if($tr=="ok"){ ?><tr><?php } $tr="ok"; ?>
                        <td class="text-center"><?=$depo_id?></td>
                        <td><strong><?=$amounti?></strong></td>
                        <td><?php include "page_report2_wd.php"; ?></td>
                        <td><strong><?=$dff?></strong></td>
                        <td><i class="fa fa-file-text"></i></td>
						</tr>
						
                        <!--
						<td class="text-center">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit User" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete User" class="btn btn-effect-ripple btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td> -->
					<?php 
					}//close if
					//else { echo "<tr><td>".$xdate2."</td><td colspan='5'>No Activity Today</td></tr>";}
					}//close while
					?>