<?php

function uploadvalid_ID($fname, $newname)
{
    $upload_directory = "uploads/IDs/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = "File Successfully Uploaded!";
        } else {
            echo $res = "File Failed to Upload!";
        }
    }
    return $res;
}

function uploadpayment($fname, $newname)
{
    $upload_directory = "uploads/payverif/payments/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = "File Successfully Uploaded!";
        } else {
            echo $res = "File Failed to Upload!";
        }
    }
    return $res;
}

function uploadreqform($fname, $newname)
{
    $upload_directory = "uploads/payverif/docrequestform/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = "File Successfully Uploaded!";
        } else {
            echo $res = "File Failed to Upload!";
        }
    }
    return $res;
}

function uploadreceipt($fname, $newname)
{
    $upload_directory = "../backoffice/uploads/receipts/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = "File Successfully Uploaded!";
        } else {
            echo $res = "File Failed to Upload!";
        }
    }
    return $res;
}

?>