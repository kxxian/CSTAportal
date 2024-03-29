<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 
require_once '../includes/connect.php';
//fetch record
if (isset($_POST['sid'])) {
    $id = $_POST['sid'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM students where id=? LIMIT 1");
    $data=array($id);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['id'];
        $output['lname'] = $row['lname'];
        $output['fname'] = $row['fname'];
        $output['mname'] = $row['mname'];
        $output['bday'] = $row['bday'];
        $output['email'] = $row['email'];
        $output['mobile'] = $row['mobile'];
        $output['cityadd'] = $row['cityadd'];
        $output['region'] = $row['region'];
        $output['district'] = $row['province'];
        $output['city'] = $row['city'];
        $output['brgy'] = $row['brgy'];
        $output['guardian'] = $row['guardian'];
        $output['gcontact'] = $row['guardiancontact'];
        $output['gcontact2'] = $row['guardiancontact2'];
    }
    echo json_encode($output);
}
if (isset($_POST['save'])){
    $id = $_POST['user_id'];
    $pass = sha1(htmlspecialchars(trim($_POST['password'])));

    //get password of user
    $statement1 = $con->prepare("SELECT pass from students where id=?");
    $data1 = array($id);
    $statement1->execute($data1);
    $row1 = $statement1->fetch();
    $checkpass = $row1['pass'];

    if ($pass == $checkpass) {

        try{
            $id=$_POST['user_id'];
            $lname=ucwords(strtolower(htmlspecialchars(trim($_POST['lname']))));
            $fname=ucwords(strtolower(htmlspecialchars(trim($_POST['fname']))));
            $mname=ucwords(strtolower(htmlspecialchars(trim($_POST['mname']))));
            $bday=$_POST['bday'];
            $email=$_POST['email'];
            $cityadd=ucwords(strtolower(htmlspecialchars(trim($_POST['cityadd']))));
            $region=$_POST['region'];
            $district=$_POST['district'];
            $city=$_POST['city'];
            $barangay=$_POST['barangay'];
            $guardian=ucwords(strtolower(htmlspecialchars(trim($_POST['guardian']))));
            $gcontact=ucwords(htmlspecialchars(trim($_POST['gcontact'])));
            $gcontact2=ucwords(htmlspecialchars(trim($_POST['gcontact2'])));
            
            $statement = $con->prepare("UPDATE students set lname=?,fname=?,mname=?,bday=?,email=?,cityadd=?,region=?,province=?,city=?,brgy=?,guardian=?,guardiancontact=?,guardiancontact2=?, dor=dor where id=?");
            $data=array($lname,$fname,$mname,$bday,$email,$cityadd,$region,$district,$city,$barangay,$guardian,$gcontact,$gcontact2,$id);
            $statement->execute($data);
            
            $_SESSION['status'] = "Success!";
            $_SESSION['status_code'] = "success";
            $_SESSION['msg'] = "Information Updated!";
            header('location: ../profile.php');
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
    }else{

         
        $_SESSION['status'] = "Oops!";
        $_SESSION['status_code'] = "warning";
        $_SESSION['msg'] = "Incorrect Password!";
        header('location: ../profile.php');
    }


    

}


if (isset($_POST['sr_id'])){
    $sr_id=$_POST['sr_id'];
    $filename=$_POST['filename'];
    $sql = "DELETE FROM studreq where sr_ID=?";
    $data = array($sr_id);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);

   

    unlink("../uploads/requirements/$filename");


}
