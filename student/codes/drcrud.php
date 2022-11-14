<?php
require_once '../includes/connect.php';
require_once 'functions.php';

//fetch 
if (isset($_POST['req_id'])) {
    $id = $_POST['req_id'];
    $output = array();
    $statement = $con->prepare("SELECT * FROM vwdocureq where reqdoc_ID='" . $id . "' LIMIT 1");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {


        if ($row['tor_purpose'] == "") {
            $tor_purpose = "";
        } else {
            $tor_purpose = ' (' . $row['tor_purpose'] . ')';
        }



        $output['id'] = $row['reqdoc_ID'];
        $output['date_sent'] = $row['date_sent'];
        $output['studstat'] = $row['stud_status'];
        $output['birthplace'] = $row['placeofbirth'];
        $output['yeargrad'] = $row['yearGrad'];
        $output['sch'] = $row['lastSchool'];
        $output['repr'] = $row['receiver_name'];
        $output['del'] = $row['deliver_add'];
        $output['cnum'] = $row['contactnum'];
        $output['cert'] = $row['cert'];
        // $output['ptotal'] = $row['particulars_transcript'];
        $output['certi'] = $row['cert'];
        $output['transs'] = $row['transcript'] . $tor_purpose;
        $output['dip'] = $row['diploma'];
        $output['ctc'] = $row['auth'];
    }
    echo json_encode($output);
}


if (isset($_POST['cancel_id'])) {
    $id = $_POST['cancel_id'];

    $statement = $con->prepare('DELETE FROM tbldocureq where reqdoc_ID=?');
    $data = array($id);
    $result = $statement->execute($data);

    unlink("../uploads/reqdoc/tor_copy/".$id.".pdf");    
   
}
