<?php   
include 'connexionMysqli.php';  

 $region=addslashes($_POST['regions']);

$query="SELECT distinct LIBELLE_MINISTERE as nomMin, CODE_MINISTERE as codes  from login where REGION='$region'";
$result=$msqli->query($query);
$data=array();
if($result){
    foreach ($result as $row) {
        $data[]=$row;
    }
}

$result->close();
$msqli->close();
$result =json_encode($data);
if (false === $result)
    echo "Erreur d'encodage JSON ! Code erreur : " . json_last_error();
else
    echo $result;
?>