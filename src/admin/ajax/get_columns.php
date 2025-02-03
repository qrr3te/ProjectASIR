<?php 
include "utils.php";

if (check_privileges()) {
   $table = get_table();
   echo json_encode(get_table_columns($table));
}
