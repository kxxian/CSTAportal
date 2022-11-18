$(document).ready(function () {

    //Capitalize input fields freshman
    $('#lname_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#mname_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#maidname_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#citizenship_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#cityadd_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#birthplace_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#pdsc_input_f').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#ce_input_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

       //Capitalize input fields transferee
       $('#lname_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#mname_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#maidname_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#citizenship_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#cityadd_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#birthplace_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#pdsc_input_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#ce_input_t').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    
       //Capitalize input fields sct
       $('#lname_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#mname_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#maidname_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#citizenship_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#cityadd_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#birthplace_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#pdsc_input_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#ce_input_sct').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

      //Capitalize input fields ue
      $('#lname_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#mname_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#maidname_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#citizenship_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#cityadd_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#birthplace_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#pdsc_input_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    
    $('#ce_input_ue').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

         //Capitalize input fields ce
         $('#lname_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#fname_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#mname_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#maidname_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#citizenship_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#txtguardian_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#cityadd_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        $('#birthplace_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
    
        $('#pdsc_input_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });
        
        $('#ce_input_ce').keyup(function(){
            $(this).css("text-transform", "capitalize");
        });



  //populate region, province, city, brgy--FRESHMAN
  $('#region').on('change', function() {
    var regCode = $(this).val();
    if (regCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'regCode=' + regCode,
            success: function(html) {
                $('#provinces').html(html);
            }
        });
    } else {
        $('#provinces').html('<option selected="" disabled>Select Province</option>');
    }
})
$('#provinces').on('change', function() {
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
        $('#provinces').html('<option selected="" disabled>Select Province</option>');
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
        $('#provinces').html('<option selected="" disabled>Select Province</option>');
        $('#city').html('<option selected="" disabled>Select City</option>');
        $('#barangay').html('<option selected="" disabled>Select Barangay</option>');
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////

  //populate region, province, city, brgy--transferee
  $('#region_trans').on('change', function() {
    var regCode = $(this).val();
    if (regCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'regCode=' + regCode,
            success: function(html) {
                $('#provinces_trans').html(html);
            }
        });
    } else {
        $('#provinces_trans').html('<option selected="" disabled>Select Province</option>');
    }
})
$('#provinces_trans').on('change', function() {
    var provCode = $(this).val();
    if (provCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'provCode=' + provCode,
            success: function(html) {
                $('#city_trans').html(html);
            }
        });
    } else {
        $('#provinces_trans').html('<option selected="" disabled>Select Province</option>');
        $('#city_trans').html('<option selected="" disabled>Select City</option>');
    }
});

$('#city_trans').on('change', function() {
    var citymunCode = $(this).val();
    if (citymunCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'citymunCode=' + citymunCode,
            success: function(html) {
                $('#barangay_trans').html(html);
            }

        });
    } else {
        $('#provinces_trans').html('<option selected="" disabled>Select Province</option>');
        $('#city_trans').html('<option selected="" disabled>Select City</option>');
        $('#barangay_trans').html('<option selected="" disabled>Select Barangay</option>');
    }
});
/////////////////////////////////////////////////////////////////////////////////////////////

  //populate region, province, city, brgy--Second course taker
  $('#region_sct').on('change', function() {
    var regCode = $(this).val();
    if (regCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'regCode=' + regCode,
            success: function(html) {
                $('#provinces_sct').html(html);
            }
        });
    } else {
        $('#provinces_sct').html('<option selected="" disabled>Select Province</option>');
    }
})
$('#provinces_sct').on('change', function() {
    var provCode = $(this).val();
    if (provCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'provCode=' + provCode,
            success: function(html) {
                $('#city_sct').html(html);
            }
        });
    } else {
        $('#provinces_sct').html('<option selected="" disabled>Select Province</option>');
        $('#city_sct').html('<option selected="" disabled>Select City</option>');
    }
});

$('#city_sct').on('change', function() {
    var citymunCode = $(this).val();
    if (citymunCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'citymunCode=' + citymunCode,
            success: function(html) {
                $('#barangay_sct').html(html);
            }

        });
    } else {
        $('#provinces_sct').html('<option selected="" disabled>Select Province</option>');
        $('#city_sct').html('<option selected="" disabled>Select City</option>');
        $('#barangay_sct').html('<option selected="" disabled>Select Barangay</option>');
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////

  //populate region, province, city, brgy--Cross-Enrollee
  $('#region_ce').on('change', function() {
    var regCode = $(this).val();
    if (regCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'regCode=' + regCode,
            success: function(html) {
                $('#provinces_ce').html(html);
            }
        });
    } else {
        $('#provinces_ce').html('<option selected="" disabled>Select Province</option>');
    }
})
$('#provinces_ce').on('change', function() {
    var provCode = $(this).val();
    if (provCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'provCode=' + provCode,
            success: function(html) {
                $('#city_ce').html(html);
            }
        });
    } else {
        $('#provinces_ce').html('<option selected="" disabled>Select Province</option>');
        $('#city_ce').html('<option selected="" disabled>Select City</option>');
    }
});

$('#city_ce').on('change', function() {
    var citymunCode = $(this).val();
    if (citymunCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'citymunCode=' + citymunCode,
            success: function(html) {
                $('#barangay_ce').html(html);
            }

        });
    } else {
        $('#provinces_ce').html('<option selected="" disabled>Select Province</option>');
        $('#city_ce').html('<option selected="" disabled>Select City</option>');
        $('#barangay_ce').html('<option selected="" disabled>Select Barangay</option>');
    }
});

/////////////////////////////////////////////////////////////////////////////////////////////

  //populate region, province, city, brgy--Unit-Earner
  $('#region_ue').on('change', function() {
    var regCode = $(this).val();
    if (regCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'regCode=' + regCode,
            success: function(html) {
                $('#provinces_ue').html(html);
            }
        });
    } else {
        $('#provinces_ue').html('<option selected="" disabled>Select Province</option>');
    }
})
$('#provinces_ue').on('change', function() {
    var provCode = $(this).val();
    if (provCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'provCode=' + provCode,
            success: function(html) {
                $('#city_ue').html(html);
            }
        });
    } else {
        $('#provinces_ue').html('<option selected="" disabled>Select Province</option>');
        $('#city_ue').html('<option selected="" disabled>Select City</option>');
    }
});

$('#city_ue').on('change', function() {
    var citymunCode = $(this).val();
    if (citymunCode) {
        $.ajax({
            type: 'POST',
            url: 'codes/register.php',
            data: 'citymunCode=' + citymunCode,
            success: function(html) {
                $('#barangay_ue').html(html);
            }

        });
    } else {
        $('#provinces_ue').html('<option selected="" disabled>Select Province</option>');
        $('#city_ue').html('<option selected="" disabled>Select City</option>');
        $('#barangay_ue').html('<option selected="" disabled>Select Barangay</option>');
    }
});





});
