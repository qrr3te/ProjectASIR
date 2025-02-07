<?php
include "../includes/connect.php";

function get_tables_array(): array {
   global $conn_root;
   global $mysqli_database;

   $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$mysqli_database' AND TABLE_NAME != 'admin' order by 1";
   $stmt = $conn_root->prepare($sql);
   $stmt->execute();
   $result = $stmt->get_result();
   $rows_array = $result->fetch_all();
   $tables_array = [];

   foreach ($rows_array as $columns) {
      array_push($tables_array, $columns[0]);
   }

   return $tables_array;
}
