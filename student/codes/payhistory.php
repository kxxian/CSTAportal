
<?php

require_once '../includes/connect.php';
require_once 'fetchcurrentsyandsem.php';
require_once 'fetchuserdetails.php';


//fetch payhistory
if (isset($_POST['param'])) {
    $sql = "SELECT * FROM vwpayverif where sid=$sid order by pv_ID asc";
    $stmt = $con->query($sql);
    $count = $stmt->rowCount();
    $strheader = '';


    foreach ($stmt as $rows) {
        $strheader .= '<tr>';

        $strheader .=' <td class="text-center text-gray-900">' . $rows['sentvia'] . '</td>';
        $strheader .='<td class="text-center text-gray-900">' . $rows['date_sent'] . '</td>';
        $strheader .='<td class="text-center text-gray-900">' . $rows['gtotal'] . '</td>';
        $strheader .='<td class="text-center"><button class="btn btn-info btn-sm"><i class="fa fa-fw fa-eye"></i></button></td>';
        $strheader .='<td class="text-center"><span class="badge badge-boxed badge-warning">' . $rows['payment_status'] . '</span></td>';
        $strheader .='<td class="text-center">';
        $strheader .='    <button class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit"></i></button>';
        $strheader .='    <button class="btn btn-danger btn-sm"><i class="fa fa-fw fa-times"></i></button>';
        $strheader .='</td>';
        $strheader .='</tr>';
    }

    echo $strheader;
}





?>