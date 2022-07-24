
<?php
require_once('includes/connect.php');

$selId=0;
$empnum='';
$lname='';
$fname='';
$mname='';
$dob='';
$religion='';
$gender='';
$dept='';
$mobile='';
$uname='';

if(isset($_GET['id'])){
    $id=(int)$_GET['id'];
    $sqlLoad="SELECT * FROM employees WHERE id=?";
    $data=array($id);
    $stmtLoad=$con->prepare($sqlLoad);
    $stmtLoad->execute($data);
    $rowSelect=$stmtLoad->fetch();
    $selId=$rowSelect['id'];
    $empnum=$rowSelect['empnum'];
    $lname=$rowSelect['lname'];
    $fname=$rowSelect['fname'];
    $mname=$rowSelect['mname'];
    $dob=$rowSelect['dob'];
    $religion=$rowSelect['religion'];
    $gender=$rowSelect['gender'];
    $dept=$rowSelect['dept'];
    $mobile=$rowSelect['mobile'];
    $uname=$rowSelect['username'];
    $stmtLoad=null;
}
    // $userid=$_POST['userid'];

    // $sql="SELECT * FROM vwstudents WHERE id=".$userid;
    // $stmt=$con->prepare($sql);
    // $stmt->execute();

    // while($row=$stmt->fetch()){
    //     echo '<table border="0" width="500"> 
    //             <tr>
    //                 <!-- <td width="300"><img src=uploads/> -->
    //                 <td style="padding: 20px;">
    //                     <p>Student Number: '.$row['snum'].'</p>
    //                     <p>Name: '.$row['fullname'].'</p>
    //                     <p>Gender: '.$row['gender'].'</p>
    //                     <p>Birthday: '.$row['bday'].'</p>
    //                     <p>Mobile: '.$row['mobile'].'</p>
    //                     <p>Email: '.$row['email'].'</p>
    //                     <p>Address: '.$row['completeaddress'].'</p>
    //                     <p>Father: '.$row['father'].'</p>
    //                     <p>Mother: '.$row['mother'].'</p>
    //                 </td>
    //             </tr>
    //           </table>';
    // }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Employee Information</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/starter-template/">

    

 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      
      <span class="fs-4">View Employee</span>
    </a>
  </header>

  <main>  
    <?php
      echo '<div class="card">
              <div class="card-header">
                <b>EMP INFO</b>
              </div>
              <div class="card-body">
                <h5 class="card-title">Employee Number: '.$empnum.'</h5>
                <p class="card-text">Name: '.$fname." ".$mname." ".$lname.'</p>
                <p class="card-text">Date of Birth: '.$dob.'</p>
                <p class="card-text">Religion: '.$religion.'</p>
                <p class="card-text">Gender: '.$gender.'</p>
                <p class="card-text">Department: '.$dept.'</p>
                <p class="card-text">Mobile: '.$mobile.'</p>
              </div>
          </div>';
    ?>
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    CSTA &middot; &copy; 2022
  </footer>
</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
