<?php
    session_start();
    
    $localhost='localhost';
    $dbname='resencement';
    try {
        $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
    } catch (PDOException $e) {
        die("Error" .$e->getMessage());
    }
    $nom_ministere=addslashes($_POST['nom_ministere']);
    $uadm=$_POST['uadm'];
    $nom=addslashes($_POST['nom']);
    $mdp=$_POST['mdp'];

    $rq=$conn->query("SELECT COUNT(uadm) as logins,UADM  from login where CODE_MINISTERE ='$nom_ministere' AND UADM='$uadm' AND NOM='$nom' and MOTPASS='$mdp'");
    if ($rq) {
		if($data=$rq->fetch()) {
            if ( $data['logins']==1) {
                $reqa=$conn->query("SELECT 	type,REGION FROM login where   UADM='$uadm' "); 
                if ($reqa) {
                    while($data=$reqa->fetch()) {
                        $_SESSION["COMPTE"] =$data['type']; 
                        $_SESSION["REGION"] =$data['REGION']; 
                    }
                }
                $_SESSION["UADM"] = $uadm;
                echo  $_SESSION["UADM"];
                header("location:index.php");
            }
            else if( $data['logins']=="0"){
                ?>
			<script type="text/javascript">
				alert("Mot de passe incorect !");
				window.location.href="Login.php";
			</script><?php 
                
            }
            else{
                echo 'tsy voa';
            }
           
		}
	}
?>
 