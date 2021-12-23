<?php  
 include 'connexionMysqli.php';  
$im=addslashes($_POST['im']);

$query=sprintf("SELECT * from agent where 	IM='$im' ");
$result=$msqli->query($query);
$data=array();
foreach ($result as $row) {
 $data[]=$row;
}
$result->close();
$msqli->close();
echo json_encode($data);
?>