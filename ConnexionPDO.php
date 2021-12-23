<?php  

    $localhost='localhost';
    $dbname='resencement';
    try {
        $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
    } catch (PDOException $e) {
        die("Error" .$e->getMessage());
    }
?>