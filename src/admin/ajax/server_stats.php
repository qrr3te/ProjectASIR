<?php 
include "utils.php";

if (check_privileges()) {
   $fp = fsockopen("172.20.0.1", 14500);
   while (!feof($fp)) {
      echo fgets($fp, 128);
   }
}
