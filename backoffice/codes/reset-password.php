<?php
require_once '../includes/connect.php';


    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    // $isAd = $_POST['isAdm'];
    $password = htmlspecialchars(trim($_POST['pwd']));
    $passwordRepeat = htmlspecialchars(trim($_POST['pwd-repeat']));

    if (empty($password) || empty($passwordRepeat)) {
        header("location: ../create-new-password.php?newpwd=empty");
        exit();
    } elseif ($password != $passwordRepeat) {
        header("location: ../create-new-password.php?newpwd=mismatched");
        exit();
    }

    $currentDate = date("U");

    try {
        $sql = "SELECT * FROM pwdreset WHERE pwdresetSelector=? AND pwdresetExpires>?";
        $data = array($selector, $currentDate);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        if ($count < 1) {
            header("location:../login.php?pwdreset=expired");
            //echo "You need to resubmit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdresetToken"]);

            if ($tokenCheck == false) {
                echo "You need to resubmit your reset request.";
                exit();
            } elseif ($tokenCheck == true) {
                $tokenEmail = $row['pwdresetEmail'];



                // if ($isAd == "no") {
                    try {
                        $sql = "SELECT email,pass FROM employees where email=?;";
                        $data = array($tokenEmail);
                        $stmt = $con->prepare($sql);
                        $stmt->execute($data);
                        $row = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if ($count < 1) {
                            echo "There was an error";
                            exit();
                        } else {
                            $newpass = sha1($password);

                            $sql2 = "UPDATE employees set pass=?, dor=dor where email=?;";
                            $data2 = array($newpass, $tokenEmail);
                            $stmt2 = $con->prepare($sql2);
                            $stmt2->execute($data2);

                            $sql3 = "DELETE FROM pwdreset where pwdresetEmail=?;";
                            $data3 = array($tokenEmail);
                            $stmt3 = $con->prepare($sql3);
                            $stmt3->execute($data3);

                            header("location:../login.php?newpwd=passwordupdated");
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                // } elseif ($isAd == "yes") {

                //     try {
                //         $sql = "SELECT email,pass FROM employees where email=?;";
                //         $data = array($tokenEmail);
                //         $stmt = $con->prepare($sql);
                //         $stmt->execute($data);
                //         $row = $stmt->fetch();
                //         $count = $stmt->rowCount();

                //         if ($count < 1) {
                //             echo "There was an error";
                //             exit();
                //         } else {
                //             $newpass = sha1($password);

                //             $sql2 = "UPDATE employees set pass=? where email=?;";
                //             $data2 = array($newpass, $tokenEmail);
                //             $stmt2 = $con->prepare($sql2);
                //             $stmt2->execute($data2);

                //             $sql3 = "DELETE FROM pwdreset where pwdresetEmail=?;";
                //             $data3 = array($tokenEmail);
                //             $stmt3 = $con->prepare($sql3);
                //             $stmt3->execute($data3);

                //             header("location:../login.php?newpwd=passwordupdated");
                //         }
                //     } catch (PDOException $e) {
                //         echo $e->getMessage();
                //     }
                // }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

