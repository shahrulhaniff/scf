<?php
include "database/server.php";

$akaun = $_POST['akaun'];
$memberid = $_POST['memberid'];

$sqlUP="UPDATE userpro set akaun = '$akaun' WHERE id='$memberid'";
$resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error());
if($resultUP){
echo ("<script LANGUAGE='JavaScript'>window.location.href='page_players.php';</script>");
exit();
}
else { echo ("<script LANGUAGE='JavaScript'>window.alert('Try Again');window.location.href='page_players.php';</script>"); }

?>