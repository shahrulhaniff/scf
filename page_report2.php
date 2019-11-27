
<div class="row">
<div class="block full">
<div class="block-title">
<h2>REPORT</h2>
</div>
<div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 150px;">Date</th>
                        <th>Detail</th>
                        <th>Deposit</th>
                        <th>Widthraw</th>
                        <th>Diff</th>
                        <th>Remark</th>
                        <!--<th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
					
					date_default_timezone_set('Asia/Kuala_Lumpur');
					
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text']  = "Active";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text']  = "On hold..";
                    $labels['2']['class'] = "label-danger";
                    $labels['2']['text']  = "Disabled";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text']  = "Pending..";
                    
					$sx = "SELECT * FROM invest ORDER BY created_date ASC LIMIT 1";
					$dx = mysqli_query($conn,$sx) or die(mysqli_error());
					$ix = mysqli_fetch_array( $dx );
					$xdate = $ix['created_date'];
					//$xdate2 = date("Y-m-d", strtotime($xdate));
					$xdate2 = "2019-11-24"; echo "letak sdri - page_report2.php";
					$datenow  = date("Y-m-d");
					while (strtotime($xdate2) <= strtotime($datenow)) {
					 $rowspan = getRow4date($xdate2);
					 $checkactivity = checkactivity($xdate2);
					 //echo $xdate2;
					 
					 if($checkactivity=="Y"){
					 if($rowspan!='0'){ echo "<td rowspan='".$rowspan."'>".$xdate2."</td>"; } 
					 
					 else { echo "<td>".$xdate2."</td>"; }
					 //echo "<tr><td rowspan='3'>".$xdate2."</td>";
					 
					 
					 include "page_report2_inv.php";
					 //echo"</tr>";
					 }
					 else { 
					 $amounti ="4";
					 $depo_id ="4";
					 include "page_report2_wd.php";
					 echo "<tr><td>".$xdate2."</td><td>".$xdate2."</td><td>".$xdate2."</td><td><strong>".$amountwd."</strong></td><td>".$dff."</td><td>NI DUMMY</td></tr>"; //XTVT
					 //echo "<tr><td>".$xdate2."</td><td colspan='5'>No Activity Today</td></tr>"; //XTVT
					 } 
					 $xdate2 = date ("Y-m-d", strtotime("+1 day", strtotime($xdate2)));
					}
					?>
                </tbody>
            </table>
        </div>
</div>
</div>
