<?php 
    require('../includes/connect.php');
    require('../codes/fetchuserdetails.php');


    $strOut = '';

    if (isset($_POST['param'])) {
        $sql = "SELECT * FROM assessment WHERE assess_snum=?";
        $data = array($snum);
        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        foreach ($stmt as $row) {
            $strOut.= '<tr>';
            $strOut.= '<td class="text-gray-900 py-2">'.$row['assess_img_name'].'</td>';
            $strOut.= '<td style="position: absolute; right: 0;">
                            <a href="uploads/assessment/'.$row['assess_img'].'" class="btn btn-success btn-sm" title="View Image"><i class="fas fa-image"></i></a>
                            <button class="btn btn-danger btn-sm mr-2" onclick="deleteRecord('.$row['aid'].')" title="Delete Image"><i class="fas fa-trash"></i></button>
                       </td>';
            $strOut.= '</tr>';
        }

        echo $strOut;
    }

    if (isset($_POST['paramDelete'])) {
        $sql = "DELETE FROM assessment WHERE aid=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$_POST['delID']]);
    }
?>