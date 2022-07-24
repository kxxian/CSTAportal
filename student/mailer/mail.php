<?php
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");
    require("PHPMailer/src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['send'])){





    $mailTo=$_POST['email'];
    $body=$_POST['body'];

    $mail=new PHPMailer();

    //$mail->SMTPDebug=3; 
    $mail->isSMTP();

    //SMTP
    $mail->Host="smtp-relay.sendinblue.com";
    $mail->SMTPAuth=true; 
    $mail->Username="jasonwafuu@gmail.com";
    $mail->Password="whxz2btTErLDGyjI";
    $mail->SMTPSecure="tls";
    $mail->Port="587";

    $mail->setFrom("jasonwafuu@gmail.com");
    $mail->FromName="Jason Munoz";
    $mail->addAddress($mailTo,"Ma. Shiella Ann");
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));

    $mail->isHTML(true);
    $mail->Subject="This is for Testing only";
    $mail->Body=$body;
    $mail->AltBody="Testing maliliit text";


    if(!$mail->send()){
        echo "Email Not Sent: ".$mail->ErrorInfo;
    }else{
        echo "Email Sent!";
    }

    $mail->smtpClose();
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="email">Email To:</label>
            <input type="email" value="" name="email" id="email"><br>

            <label for="body">Body: </label>
            <textarea name="body" id="" cols="30" rows="10"></textarea><br>
            <button type="submit" name="send">Send Email</button>
        </form>
        
    </body>
    </html>


