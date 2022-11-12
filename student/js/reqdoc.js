$(document).ready(function() {
  
    //Capitalize input fields
    $('#birthplace').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#yearGrad').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#lastSchool').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#tor').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#rep').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#deladd').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

   


    

    // $(document).on('submit', '#usersForm', function(event) {
    //     event.preventDefault();
    //     var lname = $("#lname").val();
    //     var fname = $("#fname").val();
    //     var mname = $("#mname").val();
    //     var gender = $("#gender").val();
    //     var email = $("#email").val();
    //     var gender = $("#gender").val();
    //     var mobile = $("#mobile").val();
    //     var office = $("#office").val();
    //     var dept = $("#dept").val();
    //     var role = $("#role").val();
    //     var position = $("#position").val();


    //     if (lname == "" || fname == "" || mname == "" || gender == "" ||
    //         email == "" || gender == "" || mobile == "" || !office || !dept || !role
    //         || position=="") {

    //         Swal.fire({
    //             icon: 'warning',
    //             title: 'Oops!',
    //             text: 'Insufficient Data!'
    //         })
    //     } else {
    //         $.ajax({
    //             url: "codes/userscrud.php",
    //             method: "POST",
    //             data: new FormData(this),
    //             contentType: false,
    //             processData: false,
    //             cache: false,
    //             success: function(data) {

    //                 Swal.fire({
    //                     position: 'center',
    //                     icon: 'success',
    //                     title: 'Record Updated!',
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 })

    //                 $('#usersModal').modal('hide');

    //                 // $('#usersForm')[0].reset();

    //                 usersTable.api().ajax.reload();
    //             }

    //         })
    //     }
    // })


    $(document).on('click', '.viewpaydetails', function() {
        var payment_id = $(this).attr('id');

        $.ajax({
            url: "codes/pvcrud.php",
            method: "POST",
            data: {
                payment_id: payment_id
            },
            dataType: "json",
            success: function(data) {
                $('#payverifModal').modal('show');
                $('#payment_id').val(data.id);
                $('#date_sent').html(data.date_sent);
                $('#sent_via').html(data.sent_via);
                $('#pay').html(data.paymethod);
                $('#dop').html(data.dop);
                $('#top').html(data.top);
                $('#term').html(data.term);
                $('#tfee').html(data.tfee);
                $('#gtotal').html(data.gtotal);
                $('#sysem').html(data.sysem);
                $('#part').html(data.part);
                $('#ptotal').html(data.ptotal);
                $('#paynum').html(data.paynum);
                // $('#fname').val(data.fname);
                // $('#mname').val(data.mname);
                // $('#gender').val(data.Gender);
                // $('#email').val(data.email);
                // $('#mobile').val(data.mobile);
                // $("#office").val(data.office);
                // $("#dept").val(data.dept);
                // $("#position").val(data.position);
                // $("#role").val(data.role);
                
      

                $('.title').text(' Payment Details');
                $('#payment_id').val(payment_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.cancel', function() {
        var dr_id = $(this).attr('id');
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
                    url: "codes/drcrud.php",
                    method: "POST",
                    data: {
                        cancel_id: dr_id
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
            url: "codes/editpayment.php",
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