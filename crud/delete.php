<?php
require('../database.php');

$id = isset($_POST['id']) ? $_POST['id'] : "id-Null";
echo $id;

$query = "DELETE FROM note_data WHERE id=".$id;

if ($database->query($query) == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}



$database->close();

?>