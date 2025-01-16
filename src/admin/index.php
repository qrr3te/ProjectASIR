<?php 
$admin_rights = false;

if (!$admin_rights) {
   header("Location: login.php");
   die();
}
?>
