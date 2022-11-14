$(document).ready(function() {
     //Capitalize input fields
     $('#otherpart').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
 


    

    $(document).on('submit', '#usersForm', function(event) {
        event.preventDefault();
        var lname = $("#lname").val();
        var fname = $("#fname").val();
        var mname = $("#mname").val();
        var gender = $("#gender").val();
        var email = $("#email").val();
        var gender = $("#gender").val();
        var mobile = $("#mobile").val();
        var office = $("#office").val();
        var dept = $("#dept").val();
        var role = $("#role").val();
        var position = $("#position").val();


        if (lname == "" || fname == "" || mname == "" || gender == "" ||
            email == "" || gender == "" || mobile == "" || !office || !dept || !role
            || position=="") {

            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Insufficient Data!'
            })
        } else {
            $.ajax({
                url: "codes/userscrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Record Updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#usersModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    usersTable.api().ajax.reload();
                }

            })
        }
    })


    

    $(document).on('click', '.cancel', function() {
        var gradereq_id = $(this).attr('id');
        //location.reload();
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to cancel this?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/gradecrud.php",
                    method: "POST",
                    data: {
                        gradereq_id: gradereq_id
                    },
                    success: function(data) {
                       location.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Request Deleted.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.activate', function() {
        var user_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to activate this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/userscrud.php",
                    method: "POST",
                    data: {
                        activate_id: user_id
                    },
                    success: function(data) {
                        usersTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'User has been activated.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.close', function() {
        $('#payverifModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#payverifModal').modal('hide');
    })


});


function paynum() {
    //var snum = $('#txtSnum').val();
    var paynum = $('#paynumsearch').val();

    
    
    if (paynum.length > 0 ) {

        $.ajax({
            type: "POST",
            url: "codes/edit.php",
            data: {
                paynum: paynum,
                searchpay: 1
            },
            dataType: "json",

            success: function(data) {
                $('#selsy').val(data.sy);
                $('#selsem').val(data.sem);
                $('#selterm').val(data.term);
                $('#tfeeamount').val(data.tfeeamount);
                $('#otherpart').val(data.particulars);
                $('#totalothers').val(data.totalothers);
                $('#totaldue').val(data.totaldue);
                $('#totaldue1').val(data.totaldue1);
                $('#amtpaid').val(data.amtpaid);
                $('#sentthru').val(data.sentvia);
                $('#paymethod').val(data.paymethod);
                $('#DoP').val(data.datepaid);
                $('#ToP').val(data.timepaid);
                $('#note').val(data.note);
            },
            error: function() {
            }
        });
    }
    
    
}