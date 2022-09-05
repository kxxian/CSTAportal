<?php 
    require('../includes/connect.php');

    if (isset($_POST['dateOfPayment'])) {
        
        $dateOfPayment = $_POST['dateOfPayment'];
        $tutionFee = $_POST['tutionFee'];
        $schoolYear = $_POST['schoolYear'];
        $paymentMethod = $_POST['paymentMethod'];
        $sentVia = $_POST['sentVia'];
        $totalAmount = htmlspecialchars(trim($_POST['totalAmount']));
        $studentName = htmlspecialchars(trim($_POST['studentName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $trackerId = htmlspecialchars(trim($_POST['trackerId']));
        $guestStatus = $_POST['guest_status'];

        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error    = $_FILES['image']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $img_new_name = $email.'_'.$trackerId.'.'.$img_ex_lc;

                $img_upload_path = '../uploads/guest/payments/'.$img_new_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }

        if (isset($_FILES['image2'])) {
            $img_name2 = $_FILES['image2']['name'];
            $tmp_name2 = $_FILES['image2']['tmp_name'];
            $error2   = $_FILES['image2']['error'];

            if ($error2 == 0) {
                $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
                $img_ex_lc2 = strtolower($img_ex2);
                $img_new_name2 = $trackerId.'.'.$img_ex_lc2;

                $img_upload_path2 = '../uploads/guest/payments/'.$img_new_name2;
                move_uploaded_file($tmp_name2, $img_upload_path2);
            }
        }

        if (isset($img_new_name) && isset($img_new_name2)) {
            $sql = "INSERT INTO guest_payments (guest_dtPayment, guest_tfee, guest_schoolYear, guest_payMethod, guest_sentVia, guest_totalAmt, guest_proofPayIMG, gust_studName, guest_email, guest_trackerId, guest_assessForm, guest_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$dateOfPayment, $tutionFee, $schoolYear, $paymentMethod, $sentVia, $totalAmount, $img_new_name, $studentName, $email, $trackerId, $img_new_name2, $guestStatus]);
        }
    }
?>