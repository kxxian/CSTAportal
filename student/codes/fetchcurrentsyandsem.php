<?php

      //fetch active school year
       $sql="select * from schoolyr where status='1'";
       $stmt = $con->prepare($sql);
       $stmt->execute();
       $rw=$stmt->fetch();
       $ctr=$stmt->rowCount();

       if($ctr>=1){
       $currentsy=$rw['schoolyr_ID'];
       $currentsyval=$rw['schoolyr'];

       }else{
       $currentsyval="";      
       }

      //fetch active semester
       $query="select * from semester where status='1'";
       $cmd = $con->prepare($query);
       $cmd->execute();
       $field=$cmd->fetch();
       $count=$cmd->rowCount();

       
       if($count>=1){
              $currentsem=$field['semester_ID'];
              $currentsemval=$field['semester'];
       
       }else{
              $currentsemval="";      
              }
?>
