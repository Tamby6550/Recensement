<?php 

    $msqli= new mysqli('localhost','root','','resencement');
    $msqli->set_charset("utf8");
    mysqli_set_charset($msqli, "utf8");
    if (!$msqli) {
      die("Connection failed :" .$msqli->error);
    }
?>