<?php 
    require('../includes/connect.php');

    if (isset($_POST['trackerId'])) {
        $trackerId = htmlspecialchars(trim($_POST['trackerId']));

        $sql = "SELECT guest_trackerId FROM guest_payments WHERE guest_trackerId='".$_POST['trackerId']."'";
        $stmt = $con->query($sql);

        if ($stmt->rowCount() > 0) {
            echo "<span style='color: green;'>Valid Tracker Id</span>";
            echo "<script>$('#btnSubmit').prop('disabled', false);</script>";
        } else {
            echo "<span style='color: red;'>Invalid Tracker Id</span>";
            echo "<script>$('#btnSubmit').prop('disabled', true);</script>";
        }
    }
?>