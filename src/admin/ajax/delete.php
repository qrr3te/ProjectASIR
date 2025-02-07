<?php
include "utils.php";

function delete(string $id): void {
   global $conn;

   $table = get_table();
   $sql = "DELETE FROM $table WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $id);
   $stmt->execute();
}

if (check_privileges()) {
   $id = getallheaders()["Id"] ?? "undefined";
   if ($id == "undefined" || !is_numeric($id)) {
      send_error("bad id");
   } 
   delete($id);
}
