<?php 
    require('../includes/connect.php');
    require('../codes/fetchuserdetails.php');


    if (isset($_POST['filename'])) {
        $filename = htmlspecialchars(trim($_POST['filename']));
        $stud_num = $snum;
        $stud_name = $fullname;
        $stud_email = $email;

        if (isset($_FILES['fileupload'])) {
            $img_name = $_FILES['fileupload']['name'];
            $tmp_name = $_FILES['fileupload']['tmp_name'];
            $error = $_FILES['fileupload']['error'];

            if ($error == 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $img_new_name = $snum.'_'.$filename.'.'.$img_ex_lc;

                $img_upload_path = '../uploads/assessment/'.$img_new_name;
                move_uploaded_file($tmp_name, $img_upload_path); 
            }
        }

        if (isset($img_new_name)) {
            $sql = "INSERT INTO assessment (assess_snum, assess_name, assess_email, assess_img_name, assess_img) VALUES (?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$stud_num, $stud_name, $stud_email, $filename, $img_new_name]);
        }        
    }
?>