<?php
include_once('header.php');
include_once('main-content.php');
include_once('footer.php');
?>

<?php /*

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap-4.5.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="nguyen-app.js"></script>
	<title>Tính toán chi tiêu</title>
</head>
<body>

	<div class="sticky-top">
		<div class="current-fund btn-warning text-center dropdown-toggle">
		<?php

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

				// Hiển thị fund name


			} else { // Nếu url hiện tại ko có 'biến query' thì sẽ show thông tin của data mới nhất

				// Đưa data mới nhất vào mảng $newest_fund
				$newest_fund = $sql_result[count($sql_result) - 1];

				// Tạo fund_id từ $newest_fund để xử lý thông tin sẽ hiển thị
				$fund_id = $newest_fund['id'];

				// Hiển thị fund name
				echo $newest_fund['fund_name'] ? $newest_fund['fund_name'] : "Chi tiêu #".$newest_fund['id'];
			}

			$fund_id = !empty($params['id']) ? $params['id'] : $newest_fund['id'];

			$fund_query = "SELECT * FROM fund_sec WHERE id = ".$fund_id;

			$result = $database->query($fund_query);

			while ( $row = mysqli_fetch_assoc($result) ) {
				$fund_query_rs[] = $row;
			}

		?>
		</div>

		<div class="other-funds">
		<?php foreach ($sql_result as $sql): ?>
			<?php if( $sql['id'] != $newest_fund['id'] ): ?>
				<div class="container"><a href="fund.php?id=<?php echo $sql['id']; ?>">
					<?php echo $sql['fund_name'] ? $sql['fund_name'] : "Chi tiêu #".$sql['id']; ?>
				</a></div>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</div>

	<div class="container">
		<div class="col">
			<span>Quỹ trong tuần: </span>
		</div>
		<div class="col">
			<span>Đã chi tiêu: </span>
		</div>
		<div class="col">
			<span>Còn lại: </span>
		</div>
		<div class="col text-center">
			<h5 class="align-content-center">Chi tiết chi tiêu</h5>
		</div>

		<table class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Mô tả</th>
		      <th scope="col">Số tiền</th>
		      <th scope="col">Thời gian</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Larry</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		    </tr>
		  </tbody>
		</table>

		<div class="row text-center">
			<div class="col">
				<button type="button" class="btn btn-warning">Thêm chi tiêu</button>
			</div>
			<div class="col">
				<button type="button" class="btn btn-outline-dark">Sang tuần mới</button>
			</div>
		</div>


		<form style="padding-top: 20px;">

			<div class="col text-center">
				<h5>Thêm chi tiêu trong tuần</h5>
			</div>

		  <div class="form-group row">
		  	<div class="col-sm-2">
			    <label >Mô tả</label>
		    </div>
		    <div class="col-sm-10">
		      <input id="mo-ta" type="text" class="form-control">
		    </div>
		  </div>

		  <div class="form-group row">
		  	<div class="col-sm-2">
			    <label >Tiền chi tiêu</label>
		    </div>
		    <div class="col-sm-10">
		      <input id="tien-chi" type="text" class="form-control">
		    </div>
		  </div>

		  <div class="form-group text-center">
		  	<button type="submit" class="btn btn-warning">Xác nhận</button>
		  </div>

		</form>

		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>
		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>
		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>
		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>
		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>
		<p>The parameters from a URL string can be be retrieved in PHP using pase_url() and parse_str() functions.

Note: Page URL and the parameters are separated by the ? character.

parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it. It parse an URL and return an associative array which contains its various components.

Syntax:</p>

	</div>
	
</body>
</html>				

*/ ?>