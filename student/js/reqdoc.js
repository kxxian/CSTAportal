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


    //show/hide transcript dependent fields
    $('#trans').on('change', function() {
        var seltrans=this.value;
        $('#tor2').val();
         //alert( seltrans );
        if (seltrans==2){
            $('#tor2div').css('display','block');
            $('#transpurp').css('display','block');

            $("#tor2").prop('required',true);
            $("#tor").prop('required',true);
        }else{
            $('#tor2div').hide();
            $('#transpurp').hide();
            
            $("#tor2").prop('required',false);
            $("#tor").prop('required',false);

            $("#tor2").val("");
            $("#tor").val("");

            
        }
      });

    $(document).on('click', '.viewreqdetails', function() {
        var req_id = $(this).attr('id');
// alert(req_id)
        $.ajax({
            url: "codes/drcrud.php",
            method: "POST",
            data: {
                req_id: req_id
            },
            dataType: "json",
            success: function(data) {
                $('#reqdocModal').modal('show');
                // $('#payment_id').val(data.id);
                $('#date_sent').html(data.date_sent);
                $('#stat').html(data.studstat);
                $('#bplace').html(data.birthplace);
                $('#yeargrad').html(data.yeargrad);
                $('#sch').html(data.sch);
                 $('#repr').html(data.repr);
                $('#del').html(data.del);
                $('#cnum').html(data.cnum);
                $('#certi').html(data.certi);
                $('#transs').html(data.transs);
                $('#dip').html(data.dip);
                $('#ctc').html(data.ctc);
                $('#address').html(data.address);
                $('#mobile').html(data.mobile);
                $('#purpose').html(data.purpose);
                $('#bday').html(data.bday);
                $('#reqnum').html(data.reqnum);
               
                
      

                $('#payment_id').val(req_id);

              
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


function reqnum() {
    //var snum = $('#txtSnum').val();
    var reqnum = $('#reqno').val();
    //alert(reqnum)
    
    
    if (reqnum.length > 0 ) {

        $.ajax({
            type: "POST",
            url: "codes/edit.php",
            data: {
                reqnum: reqnum,
                searchreq: 1
            },
            dataType: "json",

            success: function(data) {
                $('#birthplace').val(data.bplace);
                $('#studstat').val(data.studstat);
                $('#yearGrad').val(data.yearGrad);
                $('#lastSchool').val(data.lastSchool);
                $('#trans').val(data.trans);
                $('#authdocs').val(data.authdocs);
                $('#rep').val(data.rep);
                $('#repmob').val(data.repmob);
                $('#deladd').val(data.deladd);
            
               
            },
            error: function() {
            }
        });
    }
    
    
}