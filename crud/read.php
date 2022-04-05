<?php
require('../database.php');

$fund_id = isset($_POST['id']) ? $_POST['id'] : 'id-null';

// Lấy data từ bảng note_data
$note_query = "SELECT * FROM note_data WHERE fund_id = ".$fund_id;
$result_data = $database->query($note_query);
while ( $row = mysqli_fetch_assoc($result_data) ) {
	$note_data[] = $row;
}

echo !empty($note_data) ? die(json_encode($note_data)) : $note_data = "Null";

$database->close();

?>