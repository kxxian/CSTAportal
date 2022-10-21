// function showPassword(){
// 	let show=document.getElementById("txtcurrentpass");	
// 	if(show.type == "password"){
// 		show.type="text"
// 	}else{
// 		show.type="password"
// 	}
// }

$(document).ready(function() {
	$('#btnSubmit').click(function(e) {
		e.preventDefault()	
		let currentpass=$('#txtcurrentpass').val()
		let newpass=$('#txtnewpass').val()
		let retypepass=$('#txtrepass').val()

		if (currentpass === '' || newpass === '' || retypepass === ''){
			 Swal.fire({
				 icon:'error',
				 title:'Error',
				 width:400,
				 text:'Insufficient data',
				 showConfirmButton:false,
				 timer:1300
			})	
		}

	})	
})
		// else{
		// 	$.ajax({
		// 		type:'POST',
		// 		url:'codes/changepass.php',
		// 		data:$('#myForm').serialize() 
		// 	})
		// 	Swal.fire({
		// 		icon:'success',
		// 		title:'Success!',
		// 		width:400,
		// 		text:'Change password success!',
		// 		showConfirmButton:false,
		// 		timer:1300
		// 	})
		// 	setTimeout(function(){
		// 		window.location.href='login.php'
		// 	},1500)
		// }
