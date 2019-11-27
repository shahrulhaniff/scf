<?php
					$dataD = mysqli_query($conn,"
					SELECT 
					*
					FROM wd 
					WHERE id = '".$depo_id."'
					AND created_date LIKE '$xdate2%'
					") or die(mysqli_error());
					$total_amountwd = "0";
					while($infoD = mysqli_fetch_array( $dataD )) {
					$created_dateD = $infoD['created_date'];
					$created_dateD2 = date("Y-m-d", strtotime($created_dateD));
					$amountwd = $infoD['amount'];
					$total_amountwd = $total_amountwd + $amountwd;
					//echo $total_amountwd."<br>";
					if($created_dateD2==$xdate2){
					echo "<strong>".$amountwd."</strong><br>";
					}//close if
					//else { echo "<tr><td>".$xdate2."</td><td colspan='5'>N/A</td></tr>";}
					
					$dff = $amounti - $total_amountwd;
					$dff = number_format((float)$dff, 2, '.', ''); 
					}//close while
					if(mysqli_num_rows($dataD) > 0) { echo ""; } else { echo "0.00"; $amountwd="0"; }
					
					//$dff = $amounti -$amountwd;
					?>