<?php
 include 'connexionMysqli.php';  

$im=$_POST['im'];
$ims=$im."%";
$uadms=$_POST['uadm'];
$vf=$_POST['vf'];
$query="";
if ($vf==1) {
    $query="SELECT * FROM agent WHERE im LIKE '$ims' and recensement='1' and UADM='$uadms'";
}
else if($vf==0){
    $query="SELECT * FROM `agent` where recensement='1' and UADM='$uadms' ";
}

$result=$msqli->query($query);
$data=array();
    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $data[]=$row;
        }
    }
    else{
        $data=[
            'status'=>'0'
        ];
    }
$result->close();
$msqli->close();
echo json_encode($data);
?>