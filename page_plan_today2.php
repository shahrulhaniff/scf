 <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-vcenter">
                <?php 
				$data5 = mysqli_query($conn,"SELECT * FROM masterctrl ORDER BY created_date DESC LIMIT 5") or die(mysqli_error());
				while($info5 = mysqli_fetch_array( $data5 )) { 
				$pastdate = $info5['created_date'];
				//$pastdate = strtotime('d/m/Y', $pastdate);
				$pastdate = date("d/m/Y", strtotime($pastdate))
				?>
                    <tr>
                        <td><?=$pastdate?></td>
                        <td><?=$info5['planroi']?>%</td>
                    </tr>
				<?php } ?>
            </table>
        </div>