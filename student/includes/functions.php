<?php

function uploadpayment($fname, $newname)
{
    $upload_directory = "uploads/payverif/payments/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        $payfile=$newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = $payfile;
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
        $reqformfile=$newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = $reqformfile;
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
        $gradeuploaded=$newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = $gradeuploaded;
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

function upload_guesttor($fname, $newname)
{
    $upload_directory = "../uploads/reqdoc/guest_tor_copy/";
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

function uploadbc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/freshman/bc/";
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
function uploadgmc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/freshman/gmc/";
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

function uploadf138($fname, $newname)
{
    $upload_directory = "../uploads/requirements/freshman/f138/";
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


function uploadtransbc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/transferee/bc/";
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


function uploadtransgmc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/transferee/gmc/";
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

function uploadtranshd($fname, $newname)
{
    $upload_directory = "../uploads/requirements/transferee/hd/";
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

function uploadtranstor($fname, $newname)
{
    $upload_directory = "../uploads/requirements/transferee/tor/";
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


function uploadsctbc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/sct/bc/";
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

function uploadscttor($fname, $newname)
{
    $upload_directory = "../uploads/requirements/sct/tor/";
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

function uploaduebc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/ue/bc/";
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

function uploaduetor($fname, $newname)
{
    $upload_directory = "../uploads/requirements/ue/tor/";
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

function uploadcebc($fname, $newname)
{
    $upload_directory = "../uploads/requirements/ce/bc/";
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

function uploadcepermit($fname, $newname)
{
    $upload_directory = "../uploads/requirements/ce/permit/";
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


function uploadreq($fname, $newname)
{
    $upload_directory = "uploads/requirements/";
    if (is_uploaded_file($fname['tmp_name'])) {
        $filename = basename($fname['name']);
        $uploadfile = $upload_directory . $newname . "." . end(explode('.', $fname['name']));
        $requploaded=$newname . "." . end(explode('.', $fname['name']));
        if (move_uploaded_file($fname['tmp_name'], $uploadfile)) {
            echo $res = $requploaded;
        }else{
            echo $res = "File Failed to Upload!";
        }
    }
    return $res;
}
function upload_assess_form($fname, $newname)
{
    $upload_directory = "../uploads/payverif/guest/assessment/";
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


function uploadpof($fname, $newname)
{
    $upload_directory = "../uploads/payverif/guest/pof/";
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
