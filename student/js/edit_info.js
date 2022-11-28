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
                $('#region').val(data.region);
                $('#district').val(data.district);
                $('#city').val(data.city);
                $('#barangay').val(data.brgy);
                $('#guardian').val(data.guardian);
                $('#gcontact').val(data.gcontact);
                $('#gcontact2').val(data.gcontact2);
                
                
                

                
                $('#user_id').val(sid);
               // $('#action').val("Save");

            }
        })
    })

        //populate region, province, city, brgy
        $('#region').on('change', function() {
            var regCode = $(this).val();
            if (regCode) {
                $.ajax({
                    type: 'POST',
                    url: 'codes/register.php',
                    data: 'regCode=' + regCode,
                    success: function(html) {
                        $('#district').html(html);
                    }
                });
            } else {
                $('#district').html('<option selected="" disabled>Select Province</option>');
            }
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



    $(document).on('click', '.deletereqbtn', function() {
        var sr_id = $(this).attr('id');
        var filename= $(this).attr('filename');
       // alert(filename);

        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to delete this file?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/editinfo.php",
                    method: "POST",
                    data: {
                        sr_id: sr_id,
                        filename:filename
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'File Deleted!',
                'success'
              )
              setTimeout(function(){// wait for 5 secs(2)
               window.location.reload();
           }, 2000); 
            
            }
           
          })
         
    })











   

    $(document).on('click', '.close', function() {
        $('#editinfoModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#editinfoModal').modal('hide');
    })


});