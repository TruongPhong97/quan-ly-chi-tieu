<?php
require('../database.php');

$id = isset($_POST['id']) ? $_POST['id'] : "id-Null";
//echo $id;

$query = "DELETE FROM `fund_sec` WHERE `id` = ".$id."";

$query2 = "DELETE FROM `note_data` WHERE `fund_id` = ".$id."";
// echo $query;

if ($database->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}

if ($database->query($query2) === TRUE) {
  echo "Record updated successfully 2";
} else {
  echo "Error updating record 2 : ";
}



$database->close();

?>