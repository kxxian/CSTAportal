<?php 
require('../includes/connect.php');
require('../codes/fetchuserdetails.php');

$strOut = '';

if(isset($_POST['param'])) {
   $sql = "SELECT * FROM notes WHERE note_snum=?"; 
   $data = array($snum);
   $stmt = $con->prepare($sql);
   $stmt->execute($data);

   foreach($stmt as $row) {
       $strOut.= '<tr>';
       $strOut.= '<td class="text-gray-900 py-2">'.$row['note_text'].'</td>';
       $strOut.= '<td style="position: absolute; right: 0;">
                    <button class="btn btn-warning btn-sm" onClick="loadData('.$row['note_Id'].')" title="Edit"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" onClick="deleteData('.$row['note_Id'].')" title="Delete"><i class="fas fa-trash"></i></button>
                 </td>';
       $strOut.= '</tr>';
   }
   echo $strOut;
}


if (isset($_POST['upsert'])) {
    $note = htmlspecialchars(trim($_POST['note']));
    $studentnum = $snum;
    $data = explode('^', $_POST['Data']);

    if ($data[1] == '') {
        $sql = "INSERT INTO notes (note_snum, note_text) VALUES (?,?)";
        $data = array($studentnum, $data[0]);
    } else {
        $sql = "UPDATE notes SET note_text=? WHERE note_Id=?";
    }
    $stmt = $con->prepare($sql);
    $stmt->execute($data);
}

if (isset($_POST['paramEdit'])) {
    $sql = "SELECT * FROM notes WHERE note_Id=?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_POST['NoteID']]);
    $row = $stmt->fetch();

    echo json_encode($row);
}

if (isset($_POST['paramDelete'])) {
    $sql = "DELETE FROM notes WHERE note_Id=?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$_POST['NoteID']]);
}

?>
