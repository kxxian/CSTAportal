$(document).ready(function () {

	$('#formFreshmen').on('submit', function (e) {
		e.preventDefault()

		$.ajax({
			type: 'POST',
			url: 'functions/fn_freshmen.php',
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false
		})
	})

	$('#form138').change(function () {
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
			$('#form138').val('')	
		}
	})

	$('#form137a').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match [0] || fileType === match[1] || fileType === match[2])) {
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
				text: 'Only jpeg, jpg and png are available fiiletypes to upload'
			})
			$('#form137a').val('')
		}
	})

	$('#gmc').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match [0] || fileType === match[1] || fileType === match[2])) {
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
				text: 'Only jpeg, jpg and png are available fiiletypes to upload'
			})
			$('#gmc').val('')
		}
	})

	$('#psa').change(function () {
		let image = this.files[0]
		let fileType = image.type
		const match = ['image/jpeg', 'image/jpg', 'image/png']

		if (!(fileType === match [0] || fileType === match[1] || fileType === match[2])) {
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
				text: 'Only jpeg, jpg and png are available fiiletypes to upload'
			})
			$('#psa').val('')
		}
	})




	$('#btnSubmit').click(function () {
		let studName = $('#studName').val()
		let email = $('#email').val()
		let form_138 = $('#form138').val()
		let form_137a = $('#form137a').val()
		let gms = $('#gmc').val()
		let psa = $('#psa').val()

		if (studName === '' || email === '' || form_138 === '' || form_137a === '' || gms === '' || psa === '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				width: '400',
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				showConfirmButton: false,
				timer: 1500,
				position: 'top-right',
				text: 'Insufficient Data'
			})
		} else {
			Swal.fire({
				icon: 'success',
				title: 'Success',
				width: 400,
				position: 'top-right',
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				text: 'You have been able to submit successfully',
				showConfirmButton: false,
				timer: 1500
			})
			setTimeout(function (){
				window.location.href = 'guest_success2.php'
			},1500)
		}
	})
	 
})
