
<?php

require_once '../includes/connect.php';


if (isset($_POST['param'])) {

    $sql = "SELECT * FROM vwpayverif WHERE payment_status=?";
    $data = array('Pending');
    $stmt = $con->prepare($sql);
    $stmt->execute($data);

    while ($row = $stmt->fetch()) {

        $payment = "../student/uploads/payverif/payments/{$row['pv_ID']}.jpg";
        $reqform = "../student/uploads/payverif/docrequestform/{$row['pv_ID']}.jpg";

        if (file_exists($payment)) {

            $img = '
                <a href="../student/uploads/payverif/payments/' . $row['pv_ID'] . '.jpg"   title="Proof of Payment" class="btn btn-success" >
                <i class="fa fa-file-invoice fa-fw"></i>
                </a>';
        } else {
            $img = "";
        }

        if (file_exists($reqform)) {
            $img2 = '<a href="../student/uploads/payverif/docrequestform/' . $row['pv_ID'] . '.jpg" title="Request Form" class="btn btn-warning" >
                <i class="fa fa-file-invoice fa-fw"></i>
                </a>';
        } else {
            $img2 = "";
        }

        $reqform = "";
        echo '<tr> 
                    <td><input type="checkbox" value="' . $row['pv_ID'] . '"></td>
                    <td hidden>' . $row['sid'] . '</td>
                    <td>' . $row['snum'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td hidden>' . $row['email'] . '</td>
                    <td hidden>' . $row['mobile'] . '</td>
                    <td >' . $row['course'] . '</td>

                    <td hidden>' . $row['tfeepayment'] . '</td>
                    <td hidden>' . $row['schoolyr'] . '</td>
                    <td hidden>' . $row['semester'] . '</td>
                    <td hidden>' . $row['term'] . '</td>
                    <td hidden>' . $row['particulars'] . '</td>
                    <td hidden>₱ ' . $row['particulars_total'] . '</td>
                    


                    <td>
                    ' . $img . '
                    ' . $img2 . '
                    </td>
                   
                    <td hidden>' . $row['gtotal'] . '</td>
                    <td >' . $row['amtpaid'] . '</td>
                    <td hidden>' . $row['amtchange'] . '</td>
                    <td hidden>' . $row['sentvia'] . '</td>
                    <td hidden>' . $row['paymethod'] . '</td>
                    <td hidden>' . $row['note'] . '</td>
                    <td hidden>' . $row['datepaid'] . '</td>
                    

                    <td> 
                    <button class="btn btn-info btnPaymentDetails" onclick="loadRecord(' . $row['pv_ID'] . ')" title="Payment Details"><i class="fa fa-list fa-fw"></i></button>
                    </td>
                  </tr>';
    }
//    echo $strOut;
  

}


if (isset($_POST['viewpaydetails'])) {
    $query = "SELECT * FROM vwpayverif where pv_ID=?";
    $result = $con->prepare($query);
    $data = array($_POST['payment_ID']);
    $result->execute($data);
    $row = $result->fetch();

    echo json_encode($row);
}



