<div class="sticky-top">
		<div class="current-fund btn-warning text-center dropdown-toggle" data="<?php echo $fund_id; ?>">
			<?php echo $fund_name; ?>
		</div>

		<div class="other-funds">
			<div class="container">
				<a class="del-fund" value="<?php echo $fund_id; ?>">Xóa kỳ quỹ hiện tại</a>
			</div>
		<?php foreach ($sql_result as $sql): ?>
			<?php if( $sql['id'] != $fund_query_rs['id'] ): ?>
				<div class="container">
					<a class="fund-item" href="show-fund.php?id=<?php echo $sql['id']; ?>">
						<?php echo $sql['fund_name'] ? $sql['fund_name'] : "Chi tiêu #".$sql['id']; ?>
					</a>
					<a class="del-fund" value="<?php echo $sql['id']; ?>">Xóa</a>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</div>

	<div class="container" style="padding-top: 10px;">

		<div class="col">
			<span>Quỹ trong tuần: </span>
			<?php $fund_total = !empty($fund_query_rs['fund']) ? $fund_query_rs['fund'] : 0 ?>
			<span class="text-info"><b><?php echo $fund_total; ?></b></span>
		</div>

		<div class="col">
			<span>Đã chi tiêu: </span>
			<?php
			$spent = 0;
			if( !empty($note_data) ) {
				foreach ($note_data as $note ) {
					$spent += $note['chi_tieu'];
				}
			} ?>
			<span class="text-danger"><b><?php echo $spent; ?></b></span>
		</div>

		<div class="col">
			<span>Còn lại: </span>
			<span class="text-success"><b><?php echo ($fund_total - $spent) ?></b></span>
		</div>

		<div class="row text-center" style="padding-top: 10px;">
			<div class="col">
				<button type="button" class="add-fund-note btn btn-warning">Thêm chi tiêu</button>
			</div>
			<div class="col">
				<button type="button" class="add-fund-sec btn btn-outline-dark">Sang tuần mới</button>
			</div>
		</div>

		<div class="col text-center" style="padding-top: 20px;">
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
		  <tbody id="the_notes">
		  	<?php /* if(!empty($note_data)) { $i = 1; foreach ($note_data as $note): ?>
	  		<tr class="item-<?php echo $note['id']; ?>">
		  		<th scope="row">
		  			<a class="edit-note" value="<?php echo $note['id']; ?>">#<?php echo $i++; ?></a>
		  		</th>
				<td class="mo-ta"><?php echo $note['mo_ta']; ?></td>
				<td class="chi-tieu"><?php echo $note['chi_tieu']; ?></td>
				<td><?php echo $note['create_date']; ?></td>
			</tr>
			<?php endforeach; } else { ?>
			<tr>
				<td colspan="4" class="text-center">Bạn chưa có ghi chú chi tiêu</td>
			</tr>
			<?php } */ ?>
		  </tbody>
		</table>

		<div class="edit-fund-note">
			<form action="" method="post">

				<div class="col text-center fund-note-ttl">
					<h5>Thêm chi tiêu trong tuần</h5>
				</div>

			  <div class="form-group row">
			  	<div class="col-sm-2">
				    <label >Mô tả</label>
			    </div>
			    <div class="col-sm-10">
			      <input id="mo-ta" name="mo-ta" type="text" class="form-control">
			    </div>
			  </div>

			  <div class="form-group row">
			  	<div class="col-sm-2">
				    <label >Tiền chi tiêu</label>
			    </div>
			    <div class="col-sm-10">
			      <input id="tien-chi" name="tien-chi" type="number" class="form-control">
			    </div>
			  </div>

			  <div class="row text-center">
			  	<div class="col">
				  	<div class="submit-fund-note btn btn-warning">Cập nhật</div>
				  	<!-- <button class="submit-fund-note btn btn-warning">Cập nhật</button> -->
			  	</div>
			  	<div class="col">
				  	<div class="cacl-btn btn btn-dark">Hủy</div>
			  	</div>
			  </div>
			</form>
		</div>


		<div class="add-new-fund">
			<form action="" method="post">

				<div class="col text-center fund-note-ttl">
					<h5>Tạo kỳ quỹ mới</h5>
				</div>

			  <div class="form-group row">
			  	<div class="col-sm-2">
				    <label>Tên kỳ quỹ</label>
			    </div>
			    <div class="col-sm-10">
			      <input id="fund_name" name="fund_name" type="text" class="form-control">
			    </div>
			  </div>

			  <div class="form-group row">
			  	<div class="col-sm-2">
				    <label>Số tiền cần quản lý</label>
			    </div>
			    <div class="col-sm-10">
			      <input id="fund_amount" name="fund_amount" type="number" class="form-control">
			    </div>
			  </div>

			  <div class="row text-center">
			  	<div class="col">
				  	<div class="submit-new-fund btn btn-warning">Tạo</div>
				  	<!-- <button class="submit-fund-note btn btn-warning">Cập nhật</button> -->
			  	</div>
			  	<div class="col">
				  	<div class="cacl-btn btn btn-dark">Hủy</div>
			  	</div>
			  </div>
			</form>
		</div>
	</div>