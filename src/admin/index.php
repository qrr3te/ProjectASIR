<?php 
session_start();
$admin_status = $_SESSION["admin_status"] ?? false;

if (!$admin_status) {
   header("Location: login.php");
   die();
}
?>
