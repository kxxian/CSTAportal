



  <!-- Sweet Alert -->
  <script src="js/sweetalert.min.js"></script>

  <!-- Google Recaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>




 
 
  <?php

    if (
        
    (isset($_SESSION['status']) && $_SESSION['status'] != '') 
    
    ||
    
    
    (isset($_SESSION['msg']) && $_SESSION['msg'] != '') 
    
    ||  
    
    
    (isset($_SESSION['status_code']) && $_SESSION['status_code'] != '')  
    
    ) {
    
    ?>

  <!-- success swal -->
  <script>
      swal({
          title: "<?php echo $_SESSION['status']; ?>",
          text: "<?php echo $_SESSION['msg']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          button: false,
          timer: 4000
      });
  </script>

  <?php
    }
    unset($_SESSION['status']);
     unset($_SESSION['msg']);
      unset($_SESSION['status_code']);
    ?>
  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- End of Page Wrapper -->


  <!-- Show/hide payverif -->
  <script>
      $(document).ready(function() {
          $('#payfor').on('change', function() {
              if (this.value == 2)
              //.....................^.......
              {
                  $('#showothers').show();
                  $('#showtfee').hide();
                  $('#mopp').hide();
                  $('#showterm').hide();

              } else {

                  $('#showothers').hide();
                  $('#showtfee').show();
                  $('#mopp').show();
                  // $('#showterm').show();

              }
          });
          console.log('#payfor');
      });
  </script>

  <script>
      $(document).ready(function() {
          // Prepare the preview for profile picture
          $("#wizard-picture").change(function() {
              readURL(this);
          });
      });

      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                  $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>


  <!--nav tab-->
  <script>
      $(document).ready(function() {
          $("#myTab a").click(function(e) {
              e.preventDefault();
              $(this).tab("show");
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          $('#progstep a').on('click', function(e) {

              $(this).tab('show')
          });
      });
  </script>


  <!-- edit enrollment response -->

  <script>
      $('#enrolledit').on('click', function() {
          $("#enrolldiv").css("pointer-events", "auto");
          $("#enrolldiv").css("opacity", "1");
      });
  </script>

 

  <!-- show/hide tuitionfee amount -->
  <script type="text/javascript">
      $(function() {
          $("#chktuition").click(function() {
              if ($(this).is(":checked")) {
                  $("#mopp").removeAttr('hidden');
                  //$("#showterm").removeAttr('hidden');
                  $("#txttuitiondiv").removeAttr('hidden');
                  $("#tfeenote").removeAttr('hidden');
                  $("#showsysem").removeAttr('hidden');
                  // $("#txttuition").focus();
              } else {
                  $("#mopp").attr('hidden', 'hidden');
                  $("#showterm").attr('hidden', 'hidden');
                  $("#tfeenote").attr('hidden', 'hidden');
                  $("#txttuitiondiv").attr('hidden', 'hidden');
                  $("#showsysem").attr('hidden', 'hidden');

              }

          });
      });
  </script>


  <script>
      $(document).ready(function() {
          $('#seldept').on('change', function() {
              var deptCode = $(this).val();
              if (deptCode) {
                  $.ajax({
                      type: 'POST',
                      url: 'populatecourses.php',
                      data: 'deptid=' + deptCode,
                      success: function(html) {
                          $('#selCourse').html(html);
                      }
                  });
              } else {
                  $('#selCourse').html('<option selected="" disabled>Select Course</option>');
              }
          });
      });
  </script>