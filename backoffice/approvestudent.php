<?php
    require_once 'includes/connect.php';
    require("mailer/PHPMailer/src/PHPMailer.php");
    require("mailer/PHPMailer/src/SMTP.php");
    require("mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['approve_btn_set'])){
    
    $id = $_POST['approve_id'];



        try {
            $sql = "select * from vwstudents where id=? ";
            $data = array($id);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            $row = $stmt->fetch();
    
            $sid = $row['id'];
            $fullname = $row['fname'] . ' ' . $row['mname'] .  ' ' . $row['lname'];
            $fname=$row['fname'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $address = strtolower($row['completeaddress']);
            $region = $row['region'];
            $snum = $row['snum'];
            $bday = $row['bday'];
            $gender=$row['gender'];
            $username = $row['username'];
            $yrlevel = $row['yrlevel'];
            $course = $row['course'];
            $guardian = $row['guardian'];
            $guardiancontact = $row['guardiancontact'];
        } catch (PDOException $e) {
            $e->getMessage();
        }
  


        try{
            $sql="Update students set status='APPROVED' where id=?";
            $data=array($id);
            $stmt=$con->prepare($sql);
            $stmt->execute($data);
            //header('location:students.php');

    $mailTo=$email;

// if ($gender=="Male"){
//     $honorific="Mr.";
// }else{
//     $honorific="Ms.";
// }

    $body="Hello Teresian!<br>
     Good Day! This is to inform you that your CSTA Student Portal account registration".'<br>'.
    "has been Approved. You can now transact online with Colegio de Sta. Teresa de Avila";

    $mail=new PHPMailer();  

    //$mail->SMTPDebug=3; 
    $mail->isSMTP();

    //SMTP user credentials
    $mail->Host="smtp.mailtrap.io";
    $mail->SMTPAuth=true; 
    $mail->Username="628e47e553af20";
    $mail->Password="86316279e24051";
    $mail->SMTPSecure="tls";
    $mail->Port="587";

    $mail->setFrom("CSTA@sampleemail.com"); // insert department email here
    $mail->FromName="CSTA REGISTRAR"; // employee name + Department 
    $mail->addAddress($mailTo, $fname); // recipient
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    $mail->isHTML(true);
    $mail->Subject="ACCOUNT REGISTRATION"; // email subject
    $mail->Body=$body;

    //$mail->addAttachment(path:'img/jmunoz.jpg' , name:'pogiako.jpg');

    //$mail->AltBody="Testing maliliit text";


    if(!$mail->send()){
        echo "Email Not Sent: ".$mail->ErrorInfo;
    }else{
        echo "Email Sent!";
    }

    $mail->smtpClose();
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
