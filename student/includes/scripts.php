  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>



  <!-- Sweet Alert -->
  <script src="js/sweetalert.min.js"></script>

  <!-- Google Recaptcha-->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  



























































  <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    }
    ?>

  <!-- success swal -->
  <script>
      swal({
          title: "<?php echo $_SESSION['status']; ?>",
          //text: "",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          button: "Done",
          timer: 2000
      });
  </script>

  <?php
    unset($_SESSION['status']);
    ?>
  <script>
      $(document).ready(function() {


          $('.deletereqbtn').click(function(e) {
              e.preventDefault;
              var deleteid = $(this).closest("tr").find('.deletereqval').val();
              console.log(deleteid);

              swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this file!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                      if (willDelete) {
                          $.ajax({
                              type: "POST",
                              url: "deletereq.php",
                              data: {
                                  "delete_btn_set": 1,
                                  "delete_id": deleteid,
                              },
                              success: function(response) {
                                  swal("File Deleted!", {
                                      icon: "success",
                                  }).then((result) => {
                                      location.replace("requirements.php");
                                  });
                              }
                          });
                      }
                  });
          });
      });
  </script>


  <script>
      swal({
              title: "<?php echo $_SESSION['conf_question'] ?>",
              // text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                  swal("<?php echo $_SESSION['conf_msg'] ?>", {
                      icon: "<?php echo $_SESSION['conf_code'] ?>",
                  });
              }
          });
  </script>






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

  <script>
      $(document).ready(function() {
          $('#selmop').on('change', function() {
              if (this.value == 1)

              {

                  $('#showterm').attr('hidden', 'hidden');

              } else {

                  $('#showterm').removeAttr('hidden');

              }
          });
          console.log('#payfor');
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
