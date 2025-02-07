<?php
include "utils.php";

if (check_privileges()) {
   $table = get_table();
   $id = getallheaders()["Id"] ?? "undefined";
   if ($id == "undefined" || !is_numeric($id)) {
      send_error("bad id");
   } 
   echo json_encode(get_table_values($table, $id));
}
