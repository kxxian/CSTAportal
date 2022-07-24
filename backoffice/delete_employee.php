<?php
    require_once("includes/connect.php");

    if(isset($_GET['id'])){
        $id=(int)$_GET['id'];

        try{
            $sql="Delete from employees where id=?";
            $data= array($id);
            $stmt=$con->prepare($sql);
            $stmt->execute($data);

           header("location:employees.php");

        }catch(PDOException $e){
        echo $e->getMessage();
        }
    
    }else{
        
    }

?>