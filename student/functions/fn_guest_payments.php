<?php 
    require('../includes/connect.php');


    if(isset($_POST['fileName'])) {
        $fileName = htmlspecialchars(trim($_POST['fileName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $fullName = htmlspecialchars(trim($_POST['fullName']));

        if(isset($_FILES['file'])) {
            $img_name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $error = $_FILES['file']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $img_new_name = $fileName.'.'.$img_ex_lc;

                $img_upload_path = '../uploads/guest/payments/'.$img_new_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }

        if(isset($img_new_name)) {
            $sql = "INSERT INTO guest_payments (guest_fileName, guest_fileImage, guest_email, guest_fullName) VALUES (?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$fileName, $img_new_name, $email, $fullName]);
        }
    }
?>