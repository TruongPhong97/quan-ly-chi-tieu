<?php
require('../database.php');
$mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : "mo-ta-Null";
// echo $mo_ta;

$tien_chi = isset($_POST['tien_chi']) ? $_POST['tien_chi'] : "tien-chi-Null";
// echo $tien_chi;

$id = isset($_POST['id']) ? $_POST['id'] : "id-Null";
// echo $id;

$date = date('Y-m-d h:m:s', time());
// echo $date;

$query = "INSERT INTO note_data (`fund_id`, `mo_ta`, `chi_tieu`, `create_date`)
		  VALUES (".$id.", '".$mo_ta."', ".$tien_chi.", '".$date."')";

if ($database->query($query) == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}


$database->close();

?>