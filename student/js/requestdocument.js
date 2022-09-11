$(function() {
  

})


$(document).ready(function() {
        $("#reqdocx").validate({
           
            rules: { 
                "doc[]": { 
                        required: true, 
                        minlength: 1 
                } 
        }, 
        messages: { 
            "doc[]": "Select at least one document."
       },
       errorElement:'div',
       errorPlacement: function ( error, element ) {
           // Add the `invalid-feedback` class to the error element
           error.addClass( "invalid-feedback" );

           if ( element.prop( "type" ) == "checkbox" ) {
            error.insertAfter( element.closest  ( ".form-group" ));
           } else {
               error.insertAfter( element );
           }
       },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
            }


        });


    $(document).on('submit', '#reqdocx', function(event) {
        event.preventDefault();
        var course = $("#selcourse").val();
        var yearGrad = $("#yearGrad").val();
        var lastSchool= $("#lastSchool").val();
        var chkdoc= $(".form-check doc").val();
        // var chkpurpose= $("#chkpurpose");
        var otherpurpose= $("#otherpurpose").val();
        checked = $(".documents input[type=checkbox]:checked").length;


        if(!checked) {
            // Swal.fire({
            //     icon: 'warning',
            //     title: 'Oops!',
            //     text: 'Insufficient Data!'
            // })
            $("#docxvalid").remove_attr('hidden');

        }


        // else{
        //     $.ajax({
        //         url: "codes/reqdoc.php",
        //         method: "POST",
        //         data: new FormData(this),
        //         contentType: false,
        //         processData: false,
        //         cache: false,
        //         success: function(data) {

        //             Swal.fire({
        //                 position: 'center',
        //                 icon: 'success',
        //                 title: 'Request Submitted!',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             })

                   

        //             // usersTable.api().ajax.reload();
        //         }

        //     })
        // }
        



    })





})