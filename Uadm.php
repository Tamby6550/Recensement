<?php  
 include 'connexionMysqli.php';  
$nom=addslashes($_POST['nom']);
$code=addslashes($_POST['code']);
$region=addslashes($_POST['regions']);

$query=sprintf("SELECT UADM from login where Nom='$nom' and CODE_MINISTERE='$code' and REGION='$region' ");
$result=$msqli->query($query);
$data=array();
foreach ($result as $row) {
 $data[]=$row;
}
$result->close();
$msqli->close();
echo json_encode($data);
?>