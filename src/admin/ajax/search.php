<?php
include "utils.php";

function get_fields_filtered($table_fields, $filter): array {
   $table_fields_filtered = [];
   foreach ($table_fields as $row) {
      foreach ($row as $key => $value ) {
         if ($key == "imagen") {
            continue;
         }
         if (is_string($value)) {
            if (preg_match("/{$filter}/i", $value)) {
               array_push($table_fields_filtered, $row);
               break;
            }
         }else if (is_numeric($value)) {
            if ($filter == $value) {
               array_push($table_fields_filtered, $row);
               break;
            }
         }
      }
   }
   return $table_fields_filtered;
}

function clean_password_hash(&$table_fields) {
   for ($i = 0; $i < sizeof($table_fields); $i++) {
      $row = &$table_fields[$i];
      foreach (array_keys($row) as $key) {
         if ($key == "password") {
            $row[$key] = "*********";
         } 
      }
   }
}

function get_fields() {
   $table = get_table();
   $query = "SELECT * FROM $table";
   include "../../includes/connect.php";

   $stmt = $conn->prepare($query);
   $stmt->execute();
   $result = $stmt->get_result();
   $table_fields = $result->fetch_all(MYSQLI_ASSOC);

   if ($table == "cliente") {
      clean_password_hash($table_fields);
   }

   $filter = getallheaders()["Filter"] ?? "undefined";
   if ($filter != "undefined") {
      $table_fields = get_fields_filtered($table_fields, $filter);
   } 

   echo json_encode($table_fields);
}

if (check_privileges()) {
   get_fields();
}
