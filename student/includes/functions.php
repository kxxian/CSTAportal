<?php

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


function uploadgrade($fname, $newname)
{
    $upload_directory = "../uploads/copygrades/";
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


function validate_enroll_receipt($fname, $newname)
{
    $upload_directory = "../uploads/enroll_val/enroll_receipt/";
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

function validate_enroll_assessment($fname, $newname)
{
    $upload_directory = "../uploads/enroll_val/enroll_assess/";
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

function uploadtor($fname, $newname)
{
    $upload_directory = "../uploads/reqdoc/tor_copy/";
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