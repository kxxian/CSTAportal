$(document).ready(function () {
		
	$('#formTransferee').on('submit', function (e) {
		e.preventDefault()

		$.ajax({
			type: 'POST',
			url: 'functions/fn_transferee.php',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false
		})
	})

	$('#tor').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']
		
	if (!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				text: 'Only jpeg, jpg and png are available filetypes to upload'
			})
			$('#tor').val('')
		}
	})

	$('#honorDismiss').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				text: 'Only jpeg, jpg and png are available filetypes to upload'
			})
			$('#honorDismiss').val('')
		}
	})

	$('#gmc2').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				text: 'Only jpeg, jpg and png are available filetypes to upload'
			})
			$('#gmc2').val('')
		}
	})

	$('#psa2').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				text: 'Only jpeg, jpg and png are available filetypes to upload'
			})
			$('#psa2').val('')
		}
	})

	$('#btnSubmit2').click(function () {
		let studName2 = $('#studName2').val()
		let studType2 = $('#studType2').val()
		let email2 = $('#email2').val()
		let tor = $('#tor').val()
		let honorDismiss = $('#honorDismiss').val()
		let gmc2 = $('#gmc2').val()
		let psa2 = $('#psa2').val()

		if (studName2 === '' || studType2 === '' || email2 === '' || tor === '' || honorDismiss === '' || gmc2 === '' || psa2 === '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				position: 'top-right',
				showConfirmButton: false,
				timer: 1500,
				text: 'Insufficient Data'
			})
		} else {
			Swal.fire({
				icon: 'success',
				title: 'Success',
				width: 400,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				position: 'top-right',
				showConfirmButton: false,
				timer: 1500,
				text: 'You have been able to submit successfuly'
			})
			setTimeout(function () {
				window.location.href = 'guest_success2.php'
			},1500)
		}
	})
})
