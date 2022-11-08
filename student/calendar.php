<?php
require_once("includes/connect.php");

require_once("codes/fetchuserdetails.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendar of Events</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->




    <style>
        ::-webkit-scrollbar {
            width: .5em;
        }

        .fc-today {
            background-color: #FFDEAD !important;
        }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        $pageValue = 4;
        require_once("includes/sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php
                require_once("includes/header.php");
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">

                            <div id="calendar" class="text-gray-900 mb-5"></div>
                        </div>




                    </div>


                </div>
                <!-- /.container-fluid -->
                <!-- Start popup dialog box -->
                <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-gray-900 font-weight-bold" id="modalLabel"><i class="fas fa-fw fa-calendar"></i> <span class="title">Add New Event</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="event_name" class="font-weight-bold text-gray-900">Event name</label>
                                                <input type="text" maxlength="30" name="event_name" id="event_name" class="form-control" placeholder="Enter your event name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="event_start_date" class="font-weight-bold text-gray-900">Event start</label>
                                                <input type="date" name="event_start_date" id="event_start_date" class="form-control onlydatepicker" placeholder="Event start date">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="event_end_date" class="font-weight-bold text-gray-900">Event end</label>
                                                <input type="date" name="event_end_date" id="event_end_date" class="form-control" placeholder="Event end date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="event_id" id="event_id">
                                <input type="hidden" name="operation" id="operation">
                                <button type="button" name="action" id="action" class="btn btn-success" onclick="save_event()">Save </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End popup dialog box -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->




    <?php
    include_once("includes/scripts.php");
    ?>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>



<script>
    $(document).ready(function() {

        display_events();

        //Capitalize input fields
        $('#event_name').keyup(function() {
            $(this).css("text-transform", "capitalize");
        });


    }); //end document.ready block

    function display_events() {
        var events = new Array();
        $.ajax({
            url: 'codes/display_event.php',
            dataType: 'json',
            success: function(response) {

                var result = response.data;
                $.each(result, function(i, item) {
                    events.push({
                        event_id: result[i].event_id,
                        title: result[i].title,
                        start: result[i].start,
                        end: result[i].end,
                        color: result[i].color,
                        //url: result[i].url,
                        try_start: result[i].try_start,
                        try_end: result[i].try_end
                    });
                })
                var calendar = $('#calendar').fullCalendar({
                    defaultView: 'month',
                    timeZone: 'local',
                    editable: true,
                    selectable: true,
                    selectHelper: true,
                    fixedWeekCount: false,
                    select: function(start, end) {
                        //alert(start);
                        //alert(end);
                        $('.title').text("Add New Event");
                        $('#event_id').val("");
                        $("#event_name").val("");
                        $("#operation").val("add");
                        $('#event_start_date').val(moment(start).format('YYYY-MM-DD'));
                        $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
                        $('#event_entry_modal').modal('show');
                    },
                    events: events,
                    eventRender: function(event, element, view) {
                        element.bind('click', function() {
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-warning ml-2',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            })

                            swalWithBootstrapButtons.fire({
                                title: '',
                                text: "What do you want to do?",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Edit Event',
                                cancelButtonText: 'Remove ',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    //alert(event.try_end);
                                    var event_id = event.event_id;
                                    var event_title = event.title;
                                    var event_start = event.try_start;
                                    var event_end = event.try_end;
                                    $('#event_entry_modal').modal('show');
                                    $('#event_id').val(event_id);
                                    $("#operation").val("update");
                                    $('.title').text("Edit Event");
                                    $("#event_name").val(event_title);
                                    $("#event_start_date").val(event_start);
                                    $("#event_end_date").val(event_end);
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    var event_id = event.event_id;

                                    $.ajax({
                                        url: "codes/delete_event.php",
                                        type: "POST",
                                        dataType: 'json',
                                        data: {
                                            event_id: event_id
                                        },
                                        success: function(response) {
                                            $('#event_entry_modal').modal('hide');
                                            if (response.status == true) {
                                                location.reload();

                                            } else {
                                                Swal.fire({
                                                    position: 'center',
                                                    icon: 'warning',
                                                    title: 'Oops',
                                                    text: 'Something went wrong.',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                            }
                                        },
                                        error: function(xhr, status) {
                                            console.log('ajax error = ' + xhr.statusText);
                                            //alert(response.msg);
                                        }
                                    });
                                    return false;


                                }
                            })

                        });
                    }
                }); //end fullCalendar block	
            }, //end success block
            error: function(xhr, status) {
                alert(response.msg);
            }
        }); //end ajax block	
    }

    function save_event() {
        var event_operation = $('#operation').val();
        var event_id = $('#event_id').val();
        var event_name = $("#event_name").val();
        var event_start_date = $("#event_start_date").val();
        var event_end_date = $("#event_end_date").val();

        if (event_name == "" || event_start_date == "" || event_end_date == "") {
            Swal.fire({
                title: 'Oops!',
                text: 'Insufficient Data.',
                icon:'warning',
                timer: 1500,
                showConfirmButton: false,
            })
            return false;
        }
        $.ajax({
            url: "codes/save_event.php",
            type: "POST",
            dataType: 'json',
            data: {
                operation: event_operation,
                event_id: event_id,
                event_name: event_name,
                event_start_date: event_start_date,
                event_end_date: event_end_date
            },
            success: function(response) {
                $('#event_entry_modal').modal('hide');
                if (response.status == true) {

                    location.reload();

                } else {
                    location.reload();

                }
            },
            error: function(xhr, status) {
                console.log('ajax error = ' + xhr.statusText);
                alert(response.msg);
            }
        });
        return false;
    }
</script>



<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/header.js"></script>
<script src="js/counter.js"></script>
<script src="js/notifications.js"></script>

</html>