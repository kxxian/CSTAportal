  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

 
 
 <!-- Sweet Alert -->
 <script src="js/sweetalert.min.js"></script>

<!-- success swal -->
<script>
    swal({
        title: "<?php echo $_SESSION['status']; ?>",
        //text: "You clicked the button!",
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
        $('.deleteaccreq').click(function(e) {
            e.preventDefault;
            var deleteid = $(this).closest("tr").find('.deletereqval').val();
            console.log(deleteid);

            swal({
                    title: "Delete Request?",
                    text: "This Action Cannot be Undone!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "deleteaccreq.php",
                            data: {
                                "delete_btn_set": 1,
                                "delete_id": deleteid,
                            },
                            success: function(response) {
                                swal("Request Deleted!", {
                                    icon: "success",
                                }).then((result) => {
                                    location.replace("students.php");
                                });
                            }
                        });
                    }
                });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.approvereq').click(function(e) {
            e.preventDefault;
            var approveid = $(this).closest("tr").find('.approvereqval').val();
            console.log(approveid);

            swal({
                    title: "Approve Account?",
                    //text: "This Action Cannot be Undone!",
                    icon: "info",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "approvestudent.php",
                            data: {
                                "approve_btn_set": 1,
                                "approve_id": approveid,
                            },
                            success: function(response) {
                                swal("Request Approved!", {
                                    icon: "success",
                                }).then((result) => {
                                    location.replace("students.php");
                                });
                            }
                        });
                    }
                });
        });
    });
</script>
