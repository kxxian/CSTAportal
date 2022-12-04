<?php
require_once '../includes/connect.php';
require_once 'functions.php';
// require("../mailer/PHPMailer/src/PHPMailer.php");
// require("../mailer/PHPMailer/src/SMTP.php");
// require("../mailer/PHPMailer/src/Exception.php");

// use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['operation'])) {

    if ($_POST["operation"] == "Add") {
        $question = htmlspecialchars(trim($_POST['question']));
        $ans = htmlspecialchars(trim($_POST['ans']));
        

        $statement = $con->prepare("INSERT INTO faq (question, ans) VALUES(?,?)");

        $data = array($question, $ans);
        $result = $statement->execute($data);

    } 


    if ($_POST["operation"] == "Edit") {
        $id = $_POST['faq_id'];
        $question = htmlspecialchars(trim($_POST['question']));
        $ans = htmlspecialchars(trim($_POST['ans']));

        $statement = $con->prepare("UPDATE faq set question=?, ans=? where faq_ID=? ");

        $data = array($question, $ans, $id);
        $result = $statement->execute($data);
    }
}

//fetch 
if (isset($_POST['faq_id'])) {
    $id = $_POST['faq_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM faq where faq_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['id'] = $row['faq_ID'];
        $output['question'] = $row['question'];
        $output['ans'] = $row['ans'];
      
    }
    echo json_encode($output);
}

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    $statement = $con->prepare('DELETE from faq where faq_ID=?');
    $data = array($id);
    $result = $statement->execute($data);
}