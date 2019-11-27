<?php
   $hn      = 'localhost';
   $un      = 'supercry_root';
   $pwd     = 'supercry_root'; /* MyP@eYGB24 */
   $db      = 'supercry_bitpro';
   $cs      = 'utf8';

   //untuk web
   $conn=mysqli_connect($hn, $un, $pwd, $db) or die(mysqli_error());
   if($conn){ echo "success connect"; }
   else{ echo "no success connect"; }
?>