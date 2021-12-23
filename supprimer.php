<?php 
 include 'connexionMysqli.php'; 
    $im=$_POST['im'];
    $sql="DELETE FROM agent WHERE  IM='$im' ";
    if(mysqli_query($msqli, $sql)){
        echo "Agent supprimer !";
    }
   
?>