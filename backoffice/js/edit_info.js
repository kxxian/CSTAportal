$(document).ready(function() {
  
    $(document).on('click', '.editinfo', function() {
        var empid = $(this).attr('id');

        //console.log(sid);
        //alert(empid)

        $.ajax({
            url: "codes/editinfo.php",
            method: "POST",
            data: {
                empid: empid
            },
            dataType: "json",
            success: function(data) {
                $('#editinfoModal').modal('show');
                $('#user_id').val(data.id);
                $('#lname').val(data.lname);
                $('#fname').val(data.fname);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
                $('#user_id').val(empid);
                $('#action').val("Save");

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