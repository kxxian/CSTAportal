function recordLoader() {
	$.ajax({
		type: 'POST',
		url: 'functions/schedules.php',
		data: {
			param: 1
		}
	}).done(function (rec) {
		$('#tblSched').html(rec)
	})
}

function cleaner() {
	$('#txtId').val('')
	$('#subj').val('')	
	$('#day').val('')	
	$('#time').val('')	
}

function loadRecord(schedId) {
	Swal.fire({
		title: 'Are you sure?',
		width: 400,
		text: "Your file will be edited!",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, edit it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$('#myModal').modal('show')
		}
		$.ajax({
			type: 'POST',
			url: 'functions/schedules.php',
			data: {
				paramEdit: 1,
				SchedID: schedId
			}
		}).done(function (rec) {
			let rowEdit = $.parseJSON(rec)
			$('#txtId').val(rowEdit['schedId'])
			$('#subj').val(rowEdit['sched_subj'])
			$('#day').val(rowEdit['sched_day'])
			$('#time').val(rowEdit['sched_time'])
		})
	})
}

function deleteRecord(schedId) {
	Swal.fire({
		title: 'Are you sure?',
		width: 400,
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type: 'POST',
				url: 'functions/schedules.php',
				data: {
					paramDelete: 1,
					SchedID: schedId
				}
			}).done(function () {
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					width: 400,
					text: 'Your file has been deleted!',
					showConfirmButton: false,
					timer: 1300
				})			
				recordLoader()
			})
		}
	})
}


$(document).ready(function () {
	recordLoader()

	$('#btnSched').click(function () {
		cleaner()
		$('#myModal').modal('show')
	})

	// Autofocus  
	$('#myModal').on('shown.bs.modal', function() {
		$(this).find('[autofocus]').focus()
	})

	$('#btnSave').click(function () {
		let id = $('#txtId').val() 
		let subj = $('#subj').val() 
		let day = $('#day').val() 
		let time = $('#time').val() 
		let data = subj + '^' + day + '^' + time + '^' + id

		if (subj === '' || day === '' || time === '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops..',
				width: 400,
				text: 'Insufficient Data.'
			})
		} else {
			$.ajax({
				type: 'POST',
				url: 'functions/schedules.php',
				data: {
					upsert: 1,
					Data: data
				}
			}).done(function () {
				$('#myModal').modal('toggle')
				if (id !== '') {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your work has been updated!',
						showConfirmButton: false,
						timer: 1300
					})
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your work has been saved!',
						showConfirmButton: false,
						timer: 1300
					})	
				}	
				recordLoader()
			})
		}
	})
})
