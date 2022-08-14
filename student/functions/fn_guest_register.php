<?php 
    require('../includes/connect.php');


    if (isset($_POST['firstName'])) {
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $middleName = htmlspecialchars(trim($_POST['middleName']));
        $suffixes = htmlspecialchars(trim($_POST['suffix']));
        $address = htmlspecialchars(trim($_POST['address']));
        $email = htmlspecialchars(trim($_POST['email']));
        $mobile = htmlspecialchars(trim($_POST['mobile']));
        $telno = htmlspecialchars(trim($_POST['telno']));
        $course = $_POST['course'];
        $guardian = htmlspecialchars(trim($_POST['guardian']));
        $guardianNo = htmlspecialchars(trim($_POST['guardianNo']));
        $guardianEmail = htmlspecialchars(trim($_POST['guardianEmail']));

        $sql = "INSERT INTO guest_register (guest_first_name, guest_last_name, guest_middle_name, guest_suffix, guest_address, guest_email, guest_mobile, guest_telephone, guest_course, guest_guardian, guest_guardian_no, guest_guardian_email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$firstName, $lastName, $middleName, $suffixes, $address, $email, $mobile, $telno, $course, $guardian, $guardianNo, $guardianEmail]);
    }
?>