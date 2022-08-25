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

        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error    = $_FILES['image']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $img_new_name = $email.'.'.$img_ex_lc;

                $img_upload_path = '../uploads/guest/payments'.$img_new_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }

        if (isset($img_new_name)) {
            $sql = "INSERT INTO guest_payments (guest_dtPayment, guest_tfee, guest_schoolYear, guest_payMethod, guest_sentVia, guest_totalAmt, guest_proofPayIMG, gust_studName, guest_email) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$dateOfPayment, $tutionFee, $schoolYear, $paymentMethod, $sentVia, $totalAmount, $img_new_name, $studentName, $email]);
        }
    }
?>