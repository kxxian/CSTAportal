$(document).ready(function() {
  
    $(document).on('click', '.editinfo', function() {
        var sid = $(this).attr('id');

        //console.log(sid);


        $.ajax({
            url: "codes/editinfo.php",
            method: "POST",
            data: {
                sid: sid
            },
            dataType: "json",
            success: function(data) {
                $('#editinfoModal').modal('show');
                $('#user_id').val(data.id);
                $('#lname').val(data.lname);
                $('#fname').val(data.fname);
                $('#mname').val(data.mname);
                $('#bday').val(data.bday);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
                $('#cityadd').val(data.cityadd);
                $('#district').val(data.district);
                $('#guardian').val(data.guardian);
                $('#gcontact').val(data.gcontact);
                
                

                
                $('#user_id').val(sid);
               // $('#action').val("Save");

            }
        })
    })
    $('#district').on('change', function() {
        var provCode = $(this).val();
        if (provCode) {
            $.ajax({
                type: 'POST',
                url: 'codes/register.php',
                data: 'provCode=' + provCode,
                success: function(html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#district').html('<option selected="" disabled>Select Province</option>');
            $('#city').html('<option selected="" disabled>Select City</option>');
        }
    });

    $('#city').on('change', function() {
        var citymunCode = $(this).val();
        if (citymunCode) {
            $.ajax({
                type: 'POST',
                url: 'codes/register.php',
                data: 'citymunCode=' + citymunCode,
                success: function(html) {
                    $('#barangay').html(html);
                }

            });
        } else {
            $('#district').html('<option selected="" disabled>Select Province</option>');
            $('#city').html('<option selected="" disabled>Select City</option>');
            $('#barangay').html('<option selected="" disabled>Select Barangay</option>');
        }
    });










   

    $(document).on('click', '.close', function() {
        $('#editinfoModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#editinfoModal').modal('hide');
    })


});