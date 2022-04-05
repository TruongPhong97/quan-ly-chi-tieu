<?php
// Gọi class database và kết nối với database
require_once("database.php");



// Lấy toàn bộ data thuộc bảng func_sec
$query = "SELECT * FROM fund_sec";
$result = $database->query($query);
while ($row = mysqli_fetch_assoc($result)) {
	$sql_result[] = $row;
}


/*== XỬ LÝ DATA THEO FUND ID ==*/
// Lấy url hiện tại
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
// Dùng function parse_url() để tạo mảng từ url
$url_components = parse_url($url);

// Kiểm tra url có 'biến query' hay ko
if(  !empty($url_components['query']) ) {
  
	// Nếu có đưa các biến này vào mảng $params
	parse_str($url_components['query'], $params);

	// Tạo fund_id từ $params để xử lý thông tin sẽ hiển thị
	$fund_id = $params['id'];

} else { // Nếu url hiện tại ko có 'biến query' thì sẽ show thông tin của data mới nhất

	// Đưa data mới nhất vào mảng $newest_fund
	$newest_fund = $sql_result[count($sql_result) - 1];

	// Tạo fund_id từ $newest_fund để xử lý thông tin sẽ hiển thị
	$fund_id = $newest_fund['id'];
}

// Lấy fund_id từ url hiện tại hoặc fund_id mới nhất
$fund_id = !empty($params['id']) ? $params['id'] : $newest_fund['id'];

// Lấy data của fund_id xử lý để hiển thị
$fund_query = "SELECT * FROM fund_sec WHERE id = ".$fund_id;
$result = $database->query($fund_query);
while ( $row = mysqli_fetch_assoc($result) ) {
	$fund_query_rs['id'] = $row['id'];
	$fund_query_rs['fund'] = $row['fund'];
	$fund_query_rs['fund_name'] = $row['fund_name'];
	$fund_query_rs['create_date'] = $row['create_date'];
}
$fund_name = $fund_query_rs['fund_name'] ? $fund_query_rs['fund_name'] : "Chi tiêu #".$fund_query_rs['id'];

// Lấy data từ bảng note_data
$note_query = "SELECT * FROM note_data WHERE fund_id = ".$fund_query_rs['id'];
$result_data = $database->query($note_query);
while ( $row = mysqli_fetch_assoc($result_data) ) {
	$note_data[] = $row;
}


?>