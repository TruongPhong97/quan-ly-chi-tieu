<?php
require('../database.php');
$name = isset($_POST['name']) ? $_POST['name'] : "name-Null";
// echo $mo_ta;

$amount = isset($_POST['amount']) ? $_POST['amount'] : "amount-Null";
// echo $tien_chi;

$date = date('Y-m-d h:m:s', time());
// echo $date;

$query = "INSERT INTO fund_sec (`fund`, `fund_name`, `create_date`)
		  VALUES (".$amount.", '".$name."', '".$date."')";

if ($database->query($query) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
}


$database->close();

?>