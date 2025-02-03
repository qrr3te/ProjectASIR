<?php
function check_privileges(): bool {
   session_start();
   $admin_status = $_SESSION["admin_status"] ?? false;
   return ($admin_status) ? true : send_error("NOT ALLOWED");
}

function send_status($status) {
   echo json_encode(["status" => $status]);
   die();
}

function send_error($error) {
   echo json_encode(["error" => $error]);
   die();
}

// safely returns the associated table to the current panel
function get_table(): string {
   $table = $_COOKIE["table"] ?? false;

   if ($table == false) {
      send_error("table not selected");
   } 

   // Prevent sqli by changing table cookie
   $tables = [
      "cliente",
      "cita",
      "comprar",
      "coche",
      "carburantes"
   ];
   
   foreach ($tables as $valid_table) {
      if ($valid_table === $table) {
         return $table;
      }
   }

   send_error("TABLE INVALID");
}


class DatabaseData {
   public $name;
   public $data_type;
   public $unique;
}

function get_table_columns(string $table): array {
   include "../../includes/connect.php";
   $sql = "SELECT COLUMN_NAME, DATA_TYPE, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=?";
   $stmt = $conn_root->prepare($sql);
   $stmt->bind_param("s", $table);
   $stmt->execute();
   $result = $stmt->get_result();
   $columns = $result->fetch_all(MYSQLI_NUM); 

   $database_columns = [];
   for ($i=0; $i<sizeof($columns); $i++) {
      $column = new DatabaseData;
      $column->name = $columns[$i][0];
      $column->data_type = $columns[$i][1];

      if ($columns[$i][2] == "UNI" || $columns[$i][2] == "PRI") {
         $column->unique = true;
      } else {
         $column->unique = false;
      }

      array_push($database_columns, $column);
   }
   return $database_columns;
}

function is_password(string $hash): bool {
   $hash_info = password_get_info($hash);
   if ($hash_info["algo"] == NULL) {
      return false;
   } else {
      return true;
   }
}

function get_table_values(string $table, string $id): array {
   include("../../includes/connect.php");
   $sql = "SELECT * FROM $table WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $id);
   $stmt->execute();
   $result = $stmt->get_result();
   $row = $result->fetch_row();

   for ($i = 0; $i < sizeof($row); $i++) {
      if (is_password($row[$i])) {
         $row[$i] = "*********";
      }
   }

   return $row;
}

header("Content-type: application/json");
