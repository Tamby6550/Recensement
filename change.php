<?php 
    include 'connexionMysqli.php'; 
    $uadm=$_POST['uadm'];
    $motancein=$_POST['encien'];
    $motnouveau=$_POST['new'];
    $query="SELECT COUNT(uadm) as logind  from login where UADM='$uadm' and MOTPASS='$motancein'";
    $result=$msqli->query($query);
    $data=array();
    if($result){
        foreach ($result as $row) {
            if($row['logind']=="1"){
                $sql="UPDATE `login` SET `MOTPASS`='$motnouveau' WHERE UADM='$uadm' and MOTPASS='$motancein'";
                $resultat = $msqli->query($sql);
                if ($resultat) {
                    $data=array(
                        'Message'=>'Mot de pass change !',
                        'status'=>'1'
                    );
                }
                else{
                    $data=array(
                        'Message'=>'Mot de pass ancien incorrect !',
                        'status'=>'0'
                    );
                }
            }else if($row['logind']=="0"){
                $data=array(
                    'Message'=>'Votre ancien mot de passe est incorrect !',
                    'status'=>'0'
                );
            }
        }
    }
    echo json_encode($data);
?>