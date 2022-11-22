$(document).ready(function() {
     //Capitalize input fields
     $('#otherpart').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
 


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
        var pv_id = $(this).attr('id');
        var payproof = $(this).attr('pp');
        var reqform = $(this).attr('rf');
        // alert (payproof+reqform);
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
                    url: "codes/pvcrud.php",
                    method: "POST",
                    data: {
                        cancel_id: pv_id,
                        payproof: payproof,
                        reqform:reqform
                    },
                    success: function(data) {
                        setTimeout(function(){
                            window.location.reload();
                         }, 1500);
                    }
                })
                Swal.fire(
                    'Success!',
                    'Payment Deleted.',
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