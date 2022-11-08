function loadRecord() {
	$.ajax({
		type: 'POST',
		url: 'functions/fn_announcement_acctg.php',
		data: {
			param: 1
		}
	}).done(function (rec) {
		$('#tblmyId').html(rec);
	});
}

function fetchRecord(fetchId) {
	Swal.fire({
	  title: 'Are you sure?',
	  text: "Your file will be edited!",
	  icon: 'question',
	  width: 400,
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, edit it!'
	}).then((result) => {
	  if (result.isConfirmed) {
		 $('#myModal').modal('show');
	  }
		$.ajax({
			type: 'POST',
			url: 'functions/fn_announcement_acctg.php',
			data : {
				paramEdit: 1,
				FetchId: fetchId
			}
		}).done(function (rec) {
			let rowEdit = $.parseJSON(rec);
			$('#myId').val(rowEdit['a_id']);
			$('#day').val(rowEdit['a_day']);
			$('#month').val(rowEdit['a_month']);
			$('#office').val(rowEdit['a_office']);
			$('#title').val(rowEdit['a_title']);
			$('#desc').val(rowEdit['a_desc']);
		})
	})
}

function deleteRecord(deleteId) {
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  icon: 'warning',
	  width: 400,
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.isConfirmed) {
		  $.ajax({
			  type: 'POST',
			  url: 'functions/fn_announcement_acctg.php',
			  data: {
			 	  paramDelete: 1,
				  DeleteId: deleteId
			  }
		  }).done(function () {
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					width: 400,
					text: 'Your file has been successfully deleted!',
					showConfirmButton: false,
					timer: 1500
				});
			  loadRecord();
		  });
	  }
	})
}

function cleaner() {
	$('#myId').val('')
	$('#title').val('');
	$('#desc').val('');
}

$(document).ready(function () {
	$('#myTable').DataTable();

	loadRecord();

	$('#btnModal').click(function () {
		cleaner();
		$('#myModal').modal('show');
	})

	$('#btnPost').click(function () {
		let myId = $('#myId').val();
		let day = $('#day').val();
		let month = $('#month').val();
		let office = $('#office').val();
		let title = $('#title').val();	
		let desc = $('#desc').val();		
		let data = day + '^' + month + '^' + office + '^' + title + '^' + desc + '^' + myId;

		if (title === '' || desc === '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				text: 'Insufficient Data',
				showConfirmButton: false,
				timer: 1500
			});	
		} else {
			$.ajax({
				type: 'POST',
				url: 'functions/fn_announcement_acctg.php',
				data: {
					upsert: 1,
					Data: data
				}
			}).done(function () {
				$('#myModal').modal('toggle');
				if (myId === '') {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your post has been successfully posted!',
						showConfirmButton: false,
						timer: 1500
					});
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your work has been successfully updated!',
						showConfirmButton: false,
						timer: 1500
					});
				}
				loadRecord();
			});
		}
	});
});
