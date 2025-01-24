<?php 
include "../includes/connect.php";

$tables = [
   "clientes" => "cliente",
   "citas" => "cita",
   "copras" => "compra",
   "compras" => "comprar",
   "vehiculos" => "coche",
   "carburantes" => "carburantes",
   "none" => "none"
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $panel = $_POST["panel"] ?? "none";
} else {
   $panel = $_GET["panel"] ?? "none";
}

$table = $tables[$panel] ?? "none";

// returns all fields of the table related to the current panel; if the user do a searh returns all the fields filtered by search.
function search(string $search): array | false {
   global $conn;
   global $table;

   switch ($table) {
   case 'cliente':
      $query = "SELECT * FROM cliente WHERE ? IN (id, username, nombre, apellido, email, telefono)";
      if (empty($search)) {
         $query = "SELECT * FROM cliente";
      }
      break;
   case 'cita':
      $query = "SELECT * FROM cita WHERE ? IN (id, marca, modelo, servicio_solicitado, cliente_id, historial_id)";
      if (empty($search)) {
         $query = "SELECT * FROM cita";
      }
      break;
   case 'comprar':
      $query = "SELECT * FROM comprar WHERE ? IN (precio, cliente_id, coche_id)";
      if (empty($search)) {
         $query = "SELECT * FROM comprar";
      }
      break;
   case 'coche':
      $query = "SELECT * FROM coche WHERE ? IN (matricula, marca, modelo, precio)";
      if (empty($search)) {
         $query = "SELECT * FROM coche";
      }
      break;
   case 'carburantes':
      $query = "SELECT * FROM carburantes WHERE ? IN (nombre, precio)";
      if (empty($search)) {
         $query = "SELECT * FROM carburantes";
      }
      break;
   default: 
      return false;
      break;
   }

   $stmt = $conn->prepare($query);

   if (!empty($search)) {
      $stmt->bind_param("s", $search);
   }  

   $stmt->execute();
   $result = $stmt->get_result();
   $all_fieldss = $result->fetch_all(MYSQLI_ASSOC);

   return $all_fieldss;
}

class DatabaseData {
   public $name;
   public $data_type;
   public $unique;
}

function get_table_columns(string $table): array {
   global $conn_root;

   $sql = "SELECT COLUMN_NAME, DATA_TYPE, COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=?";
   $stmt = $conn_root->prepare($sql);
   $stmt->bind_param("s", $table);
   $stmt->execute();
   $result = $stmt->get_result();
   $columns = $result->fetch_all(MYSQLI_NUM); 

   $database_columns = [];
   for ($i=0; $i<sizeof($columns); $i++) {
      if ($columns[$i][0] == "id") {
         continue;
      }
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


class InsertError {
   public $error_type;
   public $column;
} 

function check_foreign_keys($columns, $values, $table, &$insert_errors) {
   global $conn;
   for ($i = 0; $i<sizeof($columns); $i++) {
      switch ($columns[$i]->name) {
      case "cliente_id":
         $sql = "SELECT id FROM cliente WHERE id = ?";
         break;
      case "coche_id":
         $sql = "SELECT matricula FROM coche WHERE matricula = ?";
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


function insert_values(): array {
   global $conn;
   global $tables;
   $panel = $_POST["panel"];
   $table = $tables[$panel] ?? false;
   if (!$table) {
      header("Location: index.php?panel=$panel");
      die();
   }

   // get columns
   $columns = get_table_columns($table);
   $columns_name_arr = [];
   foreach ($columns as $column) {
      array_push($columns_name_arr, $column->name);
   }

   // get parameters
   $parameters = [];
   for ($i = 0; $i<sizeof($columns); $i++) {
      array_push($parameters, "?");
   }

   // get datatypes
   $data_types = "";
   foreach ($columns as $column) {
      switch ($column->data_type) {
      case "blob":
        $data_types = $data_types . "b";
        break;
      default:
        $data_types = $data_types . "s";
        break;
      }
   }

   // get values 
   $values = [];
   $i = 0;
   foreach ($_POST as $key => $value) {
      if ($key == "action" || $key == "panel") {
         continue;
      } 
      if ($columns_name_arr[$i] == "password") {
         $value = password_hash($value, PASSWORD_ARGON2ID);
      } 
      array_push($values, $value);
      $i++;
   }
   
   if (sizeof($values) != sizeof($columns)) {
      die();
   }

   $insert_errors = [];
   check_data_type($columns, $values, $insert_errors);
   check_duplicates($columns, $values, $table, $insert_errors);

   if (sizeof($insert_errors) > 0) {
      return $insert_errors; 
   }

   check_foreign_keys($columns, $values, $table, $insert_errors);
   if (sizeof($insert_errors) > 0) {
      return $insert_errors; 
   }

   $columns_name_str = implode(", ", $columns_name_arr);
   $parameters_str = implode(", ", $parameters);
   $query = "INSERT INTO $table ($columns_name_str) VALUES ($parameters_str)";
   $stmt = $conn->prepare($query);
   $stmt->bind_param($data_types, ...$values);
   $stmt->execute();
   return $insert_errors;
}


// Check if user is logged with admin rights
session_start();
$admin_status = $_SESSION["admin_status"] ?? false;

if (!$admin_status) {
   header("Location: login.php");
   die();
}

// handle user actions
$insert_failed = false;
$action = $_POST["action"] ?? "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == "add") {
   $insert_errors = insert_values();
   if (sizeof($insert_errors) > 0) {
      $insert_failed = true;
   }
}

$search = $_GET["search"] ?? "";
$all_fields = search($search); 

?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Administration panel</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <header>
         <div id="mobile">
            <svg id="menu-icon" width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.096"></g><g id="SVGRepo_iconCarrier"> <path d="M4 18L20 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M4 12L20 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> <path d="M4 6L20 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"></path> </g></svg>
         </div>
         <div id="normal">
            <img width="100px" src="../img/Logo Vectorizado.png" id="logo">
            <svg id="home-icon" width="32px" height="32px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0L0 6V8H1V15H4V10H7V15H15V8H16V6L14 4.5V1H11V2.25L8 0ZM9 10H12V13H9V10Z" fill="#ffffff"></path> </g></svg>
         </div>
         <div id="user">
         <p id="username"><?php echo $_SESSION["username"]; ?></p>
            <svg width="32px" height="32px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#ffffff"></path> <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#ffffff"></path> </g></svg>
         </div>
      </header> 

      <nav>
         <div id="nav-inicio">Inicio</div> 
         <div id="nav-clientes">Clientes</div> 
         <div id="nav-citas">Citas</div> 
         <div id="nav-compras">Compras</div> 
         <div id="nav-vehiculos">Vehiculos</div> 
         <div id="nav-carburantes">Carburantes</div> 
      </nav>

      <div id="main-area">
         <?php 
         $search = $_GET["search"] ?? '';
         search($search);
         ?>
            <form id="add-item" method="post" action="index.php" <?php if ($insert_failed) { echo "style='display: flex'"; }?> >
            <span id="close">X</span>
            <?php 
            include "../includes/connect.php";
            $columns = get_table_columns($table);
            
            foreach ($columns as $column) {
               $error = "";
               if ($insert_failed) {
                  foreach ($insert_errors as  $insert_error) {
                     if ($insert_error->column == $column->name) {
                        $error = $insert_error->error_type;
                     }
                  }
               }

               switch ($column->data_type) {
               case "date":
                  $type = "date";
                  break;
               case "blob":
                  $type = "file";
                  break;
               default:
                  $type = "text";
                  break;
               }

               if (empty($error)) {
                  echo "<input type='$type' name='" . $column->name . "' placeholder='" . $column->name . "' required>";
               } else {
                  echo "<input type='$type' name='" . $column->name . "' placeholder='" . $column->name . "  [$error]" . "'" . "style='border: 2px solid red;'" . "required>";
               }
            }
            ?>

            <input type="hidden" name="action" value="add">
            <input type="hidden" name="panel" value="<?php echo $panel ?>">
            <input type="submit" value="Insertar datos">
         </form>

         <div id="admin-utils">
            <div id="buttons">
               <button id="add-item-btn">+</button>
               <button id="remove-item-btn">-</button>
            </div>
            <h1><?php echo $panel ?></h1>
            <form id="search-bar" action="index.php" method="get">
            <input type="text" placeholder="search" name="search" value="<?php echo $search ?>"</input>
            <input type="hidden" value="<?php echo $panel; ?>" name="panel">
               <input type="submit" value="search"></input>
            </form>
         </div> 

         <div id="table-area">
         <?php 
         if ($all_fields != false) {
            for ($i=0; $i<sizeof($all_fields); $i++) { 
         ?>
               <table class='item'>
               <tr class='field'>
                  <th id='tag'>Objeto <?php echo $i + 1;?> </th>
                  <td id='edit'>
                     <button>edit</button>
                  </td>
               </tr>

         <?php foreach ($all_fields[$i] as $key => $value) { ?>
                  <tr class='field'> 
                  <th><span><?php echo $key; ?></span></th>
                  <?php if ($key == "password") { ?>
                     <td><span>************</span></td>
                  <?php } else { ?>
                  <td><span><?php echo $value; ?></span></td>
                  <?php } ?>
                  </tr> 
         <?php } ?>

               </table>
         <?php
            }
         } ?>
         </div>

      </div>
      <script src="js/index.js"></script>
   </body>
</html>
