$(function(){

	$('.current-fund').click(function(){
		$('.other-funds').slideToggle();
	});


	$.ajax({
		type: 'POST',
		url: 'crud/read.php',
		data: { id: $('.current-fund').attr('data') },
		success: function(data){
			if( data != 'Null' ) {
				var json = $.parseJSON(data);
				var html = '';
				var i = 1;
				$.each(json, function(key, val){
					html += '<tr class="item-'+val.id+'">';
					html += '<th scope="row"><a class="edit-note" value="'+val.id+'">#'+i+'</a></th>';
					html += '<td class="mo-ta">'+val.mo_ta+'</td>';
					html += '<td class="chi-tieu">'+val.chi_tieu+'</td>';
					html += '<td class="create-date">'+val.create_date+'</td>';
					html += '</tr>';
					i++;
				});

				$('#the_notes').html(html);

				$('.edit-note').each(function(){

					$(this).click(function(){

						// Lấy note id
						var note_id = $(this).attr('value');

						// Lấy mô tả của id
						var mo_ta = $('.item-'+note_id+' .mo-ta').text();

						// Lấy chi tiêu của id
						var chi_tieu = $('.item-'+note_id+' .chi-tieu').text();

						// Hiển thị mô tả đã lấy trong edit field
						$('input[name="mo-ta"]').val(mo_ta);

						// Hiện thị chi tiêu đã lấy trong edit field
						$('input[name="tien-chi"]').val(chi_tieu);

						// Set action cho form
						//$('.edit-fund-note form').attr('action', 'crud/update.php');
						$('.edit-fund-note form').attr('data', note_id);

						// Xóa và đặt lại title của form
						$('.fund-note-ttl h5').remove();
						$('.fund-note-ttl').html('<b class="edit-ttl">Chỉnh sửa chi tiêu '+$(this).text()+'</b><a class="del-note" value="'+note_id+'">Xóa</a>');
						//$('.fund-note-ttl h5').html('Chỉnh sửa chi tiêu '+$(this).text());

						// Hiển thị form
						$('.edit-fund-note').css('display', 'block');

						$('.del-note').click(function(){
							$.ajax({
								type: 'POST',
								url: 'crud/delete.php',
								data: { id: $(this).attr('value') },
								success: function(){
									console.log("Del success");
								},
								error: function(){
									console.log("Del fail");
									alert('Lỗi AJAX');
								}
							});
							location.reload();
						});

					});
				});


			} else {
				$('#the_notes').html('<tr><td colspan="4" class="text-center">Bạn chưa có ghi chú chi tiêu</td></tr>');
			}
		},
		error: function(){
			alert('Lỗi AJAX');
		}
	});



	$('.add-fund-note').click(function(){

		// Reset các input field
		$('input[name="mo-ta"]').val('');
		// $('input[name="mo-ta"]').text('');
		$('input[name="tien-chi"]').val('');
		// $('input[name="tien-chi"]').text('');

		// Set data cho form để nhận biết form insert data
		$('.edit-fund-note form').attr('data', '0');

		// Xóa và đặt lại title của form
		$('.fund-note-ttl').empty();
		$('.fund-note-ttl').html('<h5>Thêm ghi chú chi tiêu</h5>');

		// Hiển thị form
		$('.edit-fund-note').css('display', 'block');
	});


	$('.submit-fund-note').click(function(){

		var url = '';
		var id = '';
		var data = {};
		var mota = $('input#mo-ta').val();
		var tienchi = $('input#tien-chi').val();


		if( $('.edit-fund-note form').attr('data') == 0 ) {
			url = 'crud/create.php';
			id = $('.current-fund').attr('data');
			data = { id : id, mo_ta : mota, tien_chi : tienchi };

			$.ajax({ 
			    type: 'POST',
			    url: url,
			    data: data,
			    success: function(data){
			    	console.log(data);
					location.reload();
			    },
			    error: function(request, status, error) {
			    	 console.log(request.responseText);
			    	 alert("Lỗi với AJAX");
			    }
		    });

		} else {
			url = 'crud/update.php';
			id = $('.edit-fund-note form').attr('data');
			data = { id : id, mo_ta : mota, tien_chi : tienchi };
			
			$.ajax({ 
			    type: 'POST',
			    url: url,
			    data: data,
			    success: function(data){
			    	console.log(data);
			    	$('.item-'+id+' .mo-ta').text(mota);
			    	$('.item-'+id+' .chi-tieu').text(tienchi);
					location.reload();
			    },
			    error: function(request, status, error) {
			    	 console.log(request.responseText);
			    	 alert("Lỗi với AJAX");
			    }
		    });
		}

		$('.edit-fund-note').css('display', 'none');
	});


	$('.del-fund').each(function(){
		$(this).click(function(){
			$.ajax({
				type: 'POST',
				url: 'crud/delete_f.php',
				data: { id: $(this).attr('value'), },
				success: function(data){
					console.log(data);
					// console.log('Del fund success');
					//location.reload();
				},
				error: function(){
					console.log("Del fund fail");
					alert('Lỗi AJAX');
				}
			});
			location.assign(window.location.origin);
		});
	});


	$('.add-fund-sec').click(function(){
		$('.add-new-fund').css('display', 'block');

	});

	$('.submit-new-fund').click(function(){
		var fund_name = $('input[name="fund_name"]').val();
		var fund_amount = $('input[name="fund_amount"]').val();
		$.ajax({
			type: 'POST',
			url: 'crud/create_f.php',
			data: { name: fund_name, amount: fund_amount },
			success: function(){
				console.log('Create Fund success');
			},
			error: function(){
				console.log("Create Fund Fail");
				alert('Lỗi AJAX');
			},
		});
		location.assign(window.location.origin);
		// location.reload();
	});



	$('.cacl-btn').click(function(){
		$('.edit-fund-note').css('display', 'none');
		$('.add-new-fund').css('display', 'none');
	});	



});