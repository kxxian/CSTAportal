<?php
    require_once 'includes/connect.php';
    require("mailer/PHPMailer/src/PHPMailer.php");
    require("mailer/PHPMailer/src/SMTP.php");
    require("mailer/PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['rcv_btn_set'])){
    
    $id = $_POST['rcv_id'];
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
            // $sql="Update students set status='APPROVED' where id=?";
            // $data=array($id);
            // $stmt=$con->prepare($sql);
            // $stmt->execute($data);
            //header('location:students.php');

    $mailTo=$email;

// if ($gender=="Male"){
//     $honorific="Mr.";
// }else{
//     $honorific="Ms.";
// }

    $body="Hi Ma'am/Sir,<br>

    This is duly noted, we shall update you once verified.<br>
    
    Note: Kindly use this link for your next payment.<br>
    
    https://www.cstaportal.com/payverif.php <br>
    
    Thank you.";

    $mail=new PHPMailer();  

    $mail->SMTPDebug=3; 
    $mail->isSMTP();

    //SMTP user credentials
    $mail->Host="smtp-relay.sendinblue.com";
    $mail->SMTPAuth=true; 
    $mail->Username="jasonwafuu@gmail.com";
    $mail->Password="whxz2btTErLDGyjI";
    $mail->SMTPSecure="tls";
    $mail->Port="587";

    $mail->setFrom("CSTAaccounting@sampleemail.com"); // insert department email here
    $mail->FromName="Jason Munoz -- Accounting"; // employee name + Department 
    $mail->addAddress($mailTo, $fname); // recipient
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    $mail->isHTML(true);
    $mail->Subject="Payment Received"; // email subject
    $mail->Body=$body;


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


    if(isset($_POST['verify_btn_set'])){
    
        $id = $_POST['verify_id'];
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
                $sql="Update paymentverif set status='Verified' where pv_ID=?";
                $data=array($id);
                $stmt=$con->prepare($sql);
                $stmt->execute($data);
                header('location:students.php');
    
        $mailTo=$email;
    
    // if ($gender=="Male"){
    //     $honorific="Mr.";
    // }else{
    //     $honorific="Ms.";
    // }
    
        $body="Hi Ma'am/Sir,<br>
    
        This is duly noted, we shall update you once verified.<br>
        
        Note: Kindly use this link for your next payment.<br>
        
        https://www.cstaportal.com/payverif.php <br>
        
        Thank you.";
    
        $mail=new PHPMailer();  
    
        $mail->SMTPDebug=3; 
        $mail->isSMTP();
    
        //SMTP user credentials
        $mail->Host="smtp-relay.sendinblue.com";
        $mail->SMTPAuth=true; 
        $mail->Username="jasonwafuu@gmail.com";
        $mail->Password="whxz2btTErLDGyjI";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
    
        $mail->setFrom("CSTAaccounting@sampleemail.com"); // insert department email here
        $mail->FromName="Jason Munoz -- Accounting"; // employee name + Department 
        $mail->addAddress($mailTo, $fname); // recipient
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        $mail->isHTML(true);
        $mail->Subject="Payment Received"; // email subject
        $mail->Body=$body;
    
    
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
