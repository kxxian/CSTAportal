<?php



                    $mail->setFrom($fromEmail);
                    $mail->FromName =( $fromName) ;  
                    $mail->addAddress($mailTo, $recipient); // recipient
                    $mail->SMTPOptions = array('ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => false
                    ));
                    $mail->isHTML(true);
                    $mail->Subject =$subject ; // email subject
                    $mail->Body = $body;
?>