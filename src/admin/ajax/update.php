<?php
include "utils.php";

function update() {
   $id = $_POST["id"];
   $table = get_table();
   $columns = get_table_columns($table);
   $current_values = get_table_values($table, $id);

   if (isset($_POST["password"]) && !empty($_POST["password"])) {
      $_POST["password"] = password_hash($_POST["password"], PASSWORD_ARGON2ID);
   }

   $status = true;
   $value_index = 0;
   foreach ($columns as $column) {
      $current_value = $current_values[$value_index++];

      if ($column->name == "id") {
         continue;
      }

      $new_value = "";
      switch ($column->data_type) {
      case "blob":
      case "mediumblob":
      case "longblob":
         if (!isset($_FILES[$column->name])) {
            continue 2;
         }
         if ($_FILES[$column->name]["size"] > (1024 * 1024)) {
            send_error("file too large");
         }
         $new_value = base64_encode(file_get_contents($_FILES[$column->name]["tmp_name"]));
         break;
      default:
         if (!isset($_POST[$column->name])) {
            continue 2;
         }
         $new_value = $_POST[$column->name];
         break;
      }

      if ($new_value == $current_value && $column->name != "password") {
         continue; 
      }

      if ($column->name == "password" && empty($new_value)) {
         continue;
      }

      include("../../includes/connect.php");
      $query = "UPDATE $table SET $column->name = ? WHERE id = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $new_value, $id);
      $status = $stmt->execute();
   }

   if ($status) {
      send_status("success");
   } else {
      send_status("Failure");
   }
}

if (check_privileges()) {
   update();
}
