<?php $infosys="info"; ?>
<form name="updateProfileStaff1" action="updateProfileStaff1.php" method="POST" enctype="multipart/form-data">
<table border="1" width="70%" cellpadding="5">
<tr>
<td colspan="2"><h3><b>:: Update Info</b></h3></td>
<td>`</td>
<td colspan="2"><h3><b>::Update Address:</b></h3> </td>
</tr>

<tr>
<td colspan="5">&nbsp;</td>
</tr>

<tr>
<td width="150px"> Staff ID</td>
<td width="350px"><input type="hidden" value="<?=$infosys?>" name="staffId"><h4><b><font color="green"><?php echo $_SESSION['myusername'];?></font></b></h4></td>

<td></td>
<td>Address line 1</td>
			<td><input type="text" value="<?=$infosys?>" name="houseNo"  size="40"></td> 
</tr>

<tr>
<td>Staff Name</td>
<td><input type="text" value="<?=$infosys?>" name="staffName" size="30"></td>

<td></td>
<td>City</td>
			<td><input type="text" value="<?=$infosys?>" name="city"  size="40"></td> 
</tr>

<tr>
<td>Phone Number</td>
<td><input type="text" value="<?=$infosys?>" name="phoneNo" size="30"></td>

<td></td>
<td>Poscode</td>
			<td><input type="text" value="<?=$infosys?>" name="poscode"  size="6" maxlength="5"></td> 
		</tr>
</tr>

<tr>
<td>Email</td>
<td><input type="text" value="<?=$infosys?>" name="email" size="30"></td>

<td></td>
<td>State</td>
			<td>
				<select name="state" id="state">
				<option value="<?php echo $row1['state'];?>" selected ><?php echo $row1['state'];?></option>
				<option value="Johor">Johor</option>
				<option value="Kedah">Kedah</option>
				<option value="Kelantan">Kelantan</option>
				<option value="Terengganu">Terengganu</option>
				<option value="Melaka">Melaka</option>
				<option value="N.Sembilan">N.Sembilan</option>
				<option value="Pahang">Pahang</option>
				<option value="Penang">Penang</option>
				<option value="Perak">Perak</option>
				<option value="Perlis">Perlis</option>
				<option value="Selangor">Selangor</option>
				<option value="WP Kuala Lumpur">WP Kuala Lumpur</option>
				<option value="Sabah">Sabah</option>
				<option value="Sarawak">Sarawak</option>
			</td> 
</tr>
		
<tr>
<td>Date Of Birth</td>
<td><input type="date" value="<?php echo $row1['sDob'];?>" name="sDob" size="30"></td>

<td colspan="3"></td>
</tr>


<?php $gend = $row1['gender']; ?>
		<tr>
			<td>Gender</td>
			<td>
			<input type="radio" name="gender" value="M" <?php $gender=$row1['gender']; if ($gender=='M'){ echo"CHECKED";}?> > Male 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="gender" value="F" <?php $gender=$row1['gender']; if ($gender=='F'){ echo"CHECKED";}?> > Female<br>
			</td>
		
		<td colspan="3"></td>
		</tr>
		
		<tr>
			<td>Position</td>
			<td><input type="hidden" value="<?php echo $row1['position'];?>" name="staffId"><font color="green"><?php echo $row1['position'];?></font></td> 
		
		<td colspan="3"></td>
		</tr>
		
		
<tr>
<td colspan="5">&nbsp;</td>
</tr>
<tr>
<td colspan="5" align="center"><br>
<input type="submit" name="submit" value="Update" class="btn btn-success" onClick="return checkProfileStaff()">&nbsp;
<input type="reset" value="Reset" class="btn btn-danger">&nbsp;
<a href="index2.php?page=profileStaff" class='btn btn-primary'>Cancel</a>
</td>
</tr>
</table>
</form>