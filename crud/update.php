<?php
require('../database.php');
$mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : "mo-ta-Null";

$tien_chi = isset($_POST['tien_chi']) ? $_POST['tien_chi'] : "tien-chi-Null";

$id = isset($_POST['id']) ? $_POST['id'] : "id-Null";

$query = "UPDATE note_data SET `mo_ta` = '".$mo_ta."', `chi_tieu` = '".$tien_chi."' WHERE id = '".$id."'";

if ($database->query($query) == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}



$database->close();

?>