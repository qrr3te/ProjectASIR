<?php 
include "utils.php";

class InsertError {
   public $error_type;
   public $column;
} 

function check_foreign_keys($columns, $values, &$insert_errors) {
   global $conn;
   for ($i = 0; $i<sizeof($columns); $i++) {
      switch ($columns[$i]->name) {
      case "cliente_id":
         $sql = "SELECT id FROM cliente WHERE id = ?";
         break;
      case "coche_id":
         $sql = "SELECT id FROM coche WHERE id = ?";
         break;
      }

      if (!empty($sql)) {
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("s", $values[$i]);
         $stmt->execute();
         $result = $stmt->get_result();

         if ($result->num_rows != 1) {
            $insert_error = new InsertError;
            $insert_error->error_type = "Referencia invalida";
            $insert_error->column = $columns[$i]->name;
            array_push($insert_errors, $insert_error);
         } 
      }
   }
}

function check_duplicates(array $columns, array $values, $table, &$insert_errors) {
   global $conn;
   $i = 0;
   foreach ($columns as $column) {
      if ($column->unique) {
         $sql = "SELECT $column->name FROM $table WHERE $column->name = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("s", $values[$i]);
         $stmt->execute();
         $results = $stmt->get_result();
         if ($results->num_rows > 0) {
            $insert_error = new InsertError;
            $insert_error->error_type = "Duplicado";
            $insert_error->column = $column->name;
            array_push($insert_errors, $insert_error);
         } 
      }
      $i++;
   }
}

function check_data_type(array $columns, array $values, &$insert_errors) {
   $i = 0;
   foreach ($columns as $column) {
      if ($column->data_type == "decimal" || $column->data_type == "int") {
         if (!is_numeric($values[$i])) {
            $insert_error = new InsertError;
            $insert_error->error_type = "Tipo de datos incorrecto";
            $insert_error->column = $column->name;
            array_push($insert_errors, $insert_error);
         }
      }
      $i++;
   }
}

function validate_row_content($columns, $row) {
   
}

function insert() {
   $table = get_table();
   $columns = get_table_columns($table);

   if (isset($_POST["password"])) {
      $_POST["password"] = password_hash($_POST["password"], PASSWORD_ARGON2ID);
   }

   $long_data = false;
   $columns_name = [];
   $values = [];
   $data_types = "";
   foreach ($columns as $column) {
      if ($column->name == "id") {
         continue;
      }
      switch ($column->data_type) {
      case "blob":
      case "mediumblob":
      case "longblob":
         if ($_FILES[$column->name]["size"] > (1024 * 1024)) {
            send_error("file too large");
         }
         $image_bin = base64_encode(file_get_contents($_FILES[$column->name]["tmp_name"]));
         array_push($values, $image_bin);
         break;
      default:
         array_push($values, $_POST[$column->name]);      
         break;
      }
      $data_types = $data_types . "s";
      array_push($columns_name, $column->name);
   }

   if (sizeof($values) != sizeof($columns) - 1) {
      send_error("fatal");
   }

   validate_row_content($columns, $values);

   // get parameters
   $parameters = [];
   for ($i = 0; $i<sizeof($values); $i++) {
      array_push($parameters, "?");
   }

   // insert values
   $columns_name_str = implode(", ", $columns_name);
   $parameters_str = implode(", ", $parameters);

   include("../../includes/connect.php");
   $query = "INSERT INTO $table ($columns_name_str) VALUES ($parameters_str)";
   $stmt = $conn->prepare($query);
   $stmt->bind_param($data_types, ...$values);

   $executed = $stmt->execute();
   if ($executed) {
      send_status("success");
   } else {
      send_status("filure");
   }
}

if (check_privileges()) {
   insert();
}
