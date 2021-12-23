<?php  

    ini_set('display_errors', 'On');

    $localhost='localhost';
    $dbname='resencement';
    try {
        $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
    } catch (PDOException $e) {
        die("Error" .$e->getMessage());
    }
   $types=$_POST['typesa'];
    $dateEntreAdmission=$_POST['dateEntreAdmission'];
    $dateIntegration=$_POST['dateIntegration'];
    $dateTitularisation=$_POST['dateTitularisation'];
    $dateDepartRetraite=$_POST['dateDepartRetraite'];
    $validation=$_POST['validation'];
    $observation=$_POST['observation'];
    $uadm=$_POST['uadm'];
    $datePaiments="1900-01-01";//Par défaut date de paiement , 
    $recensement=1;

if ($types=="Ajout") {
    $num=$_POST['num'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
        $reqa=$conn->query("SELECT * from agent where IM='$num' "); 
        if ($reqa) {
            if($data=$reqa->fetch()) {//Raha oatraka efa anaty base de donne
                ?>
                <script type="text/javascript">
                    alert("Cette agent est déjà enregistrer dans la base de donnes !");
                    window.location.href="index.php";
                </script><?php 
            }
        
        else{
        if ($validation=="1") {
            $valid=1;
            $preCompteSolde=$_POST['preCompteSolde'];
            $numOrdreRecette=$_POST['numOrdreRecette'];
            $montantValidation=$_POST['montantValidation'];
                if ($preCompteSolde=="preCompteSolde") {
                    $preCompteSoldes=1;
                    $partiel=0;
                    $integ=0;
                    $nonPaye=0;
                    $table=array($num,$nom,$prenom,$dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$uadm,$recensement);
                    $req3=$conn->prepare("INSERT INTO `agent` (`IM`, `Nom`, `Prenom`, `DateEntreAdmission`, `DateIntegration`, `DateTitularisation`, `DateDepartRetraite`, `Validation`, `NumOrdreRecette`, `MontantValidation`, `PrecompteSolde`, `Integral`, `Partiel`,`DatePaiment`, `NonEncorePaye`, `Observation`,`UADM`,recensement)
                     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $req3->execute($table);
                    ?>
                    <script type="text/javascript">
                        alert("Insertion reuissie");
                        window.location.href="index.php";
                    </script><?php 
                    //  echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                }
                else if($preCompteSolde=="preComptePublic"){
                    $integral=$_POST['integral'];
                    if ($integral=="Integral") {
                        $preCompteSoldes=0;
                        $partiel=0;
                        $integ=1;
                        $nonPaye=0;
                        $table=array($num,$nom,$prenom,$dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$uadm,$recensement);
                        $req3=$conn->prepare("INSERT INTO `agent` (`IM`, `Nom`, `Prenom`, `DateEntreAdmission`, `DateIntegration`, `DateTitularisation`, `DateDepartRetraite`, `Validation`, `NumOrdreRecette`, `MontantValidation`, `PrecompteSolde`, `Integral`, `Partiel`,`DatePaiment`, `NonEncorePaye`, `Observation`,`UADM`,recensement)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $req3->execute($table);
                        ?>
                    <script type="text/javascript">
                        alert("Insertion reuissie");
                        window.location.href="index.php";
                    </script><?php 
                        // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                    }
                    else if($integral=="Partiel"){
                        $preCompteSoldes=0;
                        $partiel=1;
                        $integ=0;
                        $nonPaye=0;
                        $datePaiments=$_POST['datepaiement'];
                        $table=array($num,$nom,$prenom,$dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$uadm,$recensement);
                        $req3=$conn->prepare("INSERT INTO `agent` (`IM`, `Nom`, `Prenom`, `DateEntreAdmission`, `DateIntegration`, `DateTitularisation`, `DateDepartRetraite`, `Validation`, `NumOrdreRecette`, `MontantValidation`, `PrecompteSolde`, `Integral`, `Partiel`,`DatePaiment`, `NonEncorePaye`, `Observation`,`UADM`,recensement)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $req3->execute($table);
                        ?>
                    <script type="text/javascript">
                        alert("Insertion reuissie");
                        window.location.href="index.php";
                    </script><?php 
                        // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                    
                    }
                }else if($preCompteSolde=="nonPaye"){
                        $preCompteSoldes=0;
                        $partiel=0;
                        $integ=0;
                        $nonPaye=1;
                        $table=array($num,$nom,$prenom,$dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$uadm,$recensement);
                        $req3=$conn->prepare("INSERT INTO `agent` (`IM`, `Nom`, `Prenom`, `DateEntreAdmission`, `DateIntegration`, `DateTitularisation`, `DateDepartRetraite`, `Validation`, `NumOrdreRecette`, `MontantValidation`, `PrecompteSolde`, `Integral`, `Partiel`,`DatePaiment`, `NonEncorePaye`, `Observation`,`UADM`,recensement)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $req3->execute($table);
                        ?>
                    <script type="text/javascript">
                        alert("Insertion reuissie");
                        window.location.href="index.php";
                    </script><?php 
                        // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                    }
            }
            
        else if($validation=="0"){
            $valid=0;
            $numOrdreRecette=0;
            $montantValidation=0;
            $preCompteSoldes=0;
            $partiel=0;
            $integ=0;
            $nonPaye=0;
                $table=array($num,$nom,$prenom,$dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$uadm,$recensement);
                $req3=$conn->prepare("INSERT INTO `agent` (`IM`, `Nom`, `Prenom`, `DateEntreAdmission`, `DateIntegration`, `DateTitularisation`, `DateDepartRetraite`, `Validation`, `NumOrdreRecette`, `MontantValidation`, `PrecompteSolde`, `Integral`, `Partiel`,`DatePaiment`, `NonEncorePaye`, `Observation`,`UADM`,recensement)
                 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $req3->execute($table);
                ?>
                <script type="text/javascript">
                    alert("Insertion reuissie");
                    window.location.href="index.php";
                </script><?php 
                // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
            
     }
    }
}
   }   // Recensement d'un agent
    else if($types=="Recenser"){ 
        $num=$_POST['numh'];
        if ($validation=="1") {
            $valid=1;
            $preCompteSolde=$_POST['preCompteSolde'];
            $numOrdreRecette=$_POST['numOrdreRecette'];
            $montantValidation=$_POST['montantValidation'];
            if ($preCompteSolde=="preCompteSolde") {
                $preCompteSoldes=1;
                $partiel=0;
                $integ=0;
                $nonPaye=0;
                $table=array($dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$recensement);
                $rec=$conn->prepare("UPDATE agent SET DateEntreAdmission=?,DateIntegration=?,DateTitularisation=?,DateDepartRetraite=?,`Validation`=?,NumOrdreRecette=?,MontantValidation=?,`PrecompteSolde`=?,Integral=?,Partiel=?,`DatePaiment`=?,NonEncorePaye=?,Observation=?,recensement=? WHERE IM='$num' ");
                $rec->execute($table);
                ?>
                <script type="text/javascript">
                    alert("Modification reuissie !");
                    window.location.href="index.php";
                </script><?php 
                // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
            }
            else if($preCompteSolde=="preComptePublic"){
                $integral=$_POST['integral'];
                if ($integral=="Integral") {
                    $preCompteSoldes=0;
                    $partiel=0;
                    $integ=1;
                    $nonPaye=0;
                    $table=array($dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$recensement);
                    $rec1=$conn->prepare("UPDATE agent SET DateEntreAdmission=?,DateIntegration=?,DateTitularisation=?,DateDepartRetraite=?,`Validation`=?,NumOrdreRecette=?,MontantValidation=?,`PrecompteSolde`=?,Integral=?,Partiel=?,`DatePaiment`=?,NonEncorePaye=?,Observation=?,recensement=? WHERE IM='$num' ");
                    $rec1->execute($table);
                    ?>
                <script type="text/javascript">
                    alert("Modification reuissie !");
                    window.location.href="index.php";
                </script><?php 
                    // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                    
                }
                else if($integral=="Partiel"){
                    $preCompteSoldes=0;
                    $partiel=1;
                    $integ=0;
                    $nonPaye=0;
                    $datePaiments=$_POST['datepaiement'];
                    $table=array($dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$recensement);
                    $rec1=$conn->prepare("UPDATE agent SET DateEntreAdmission=?,DateIntegration=?,DateTitularisation=?,DateDepartRetraite=?,`Validation`=?,NumOrdreRecette=?,MontantValidation=?,`PrecompteSolde`=?,Integral=?,Partiel=?,`DatePaiment`=?,NonEncorePaye=?,Observation=?,recensement=? WHERE IM='$num' ");
                    $rec1->execute($table);
                    ?>
                <script type="text/javascript">
                    alert("Modification reuissie !");
                    window.location.href="index.php";
                </script><?php 
                    // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
                }
            }else if($preCompteSolde=="nonPaye"){
                    $preCompteSoldes=0;
                    $partiel=0;
                    $integ=0;
                    $nonPaye=1;
                    $table=array($dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$recensement);
                    $rec1=$conn->prepare("UPDATE agent SET DateEntreAdmission=?,DateIntegration=?,DateTitularisation=?,DateDepartRetraite=?,`Validation`=?,NumOrdreRecette=?,MontantValidation=?,`PrecompteSolde`=?,Integral=?,Partiel=?,`DatePaiment`=?,NonEncorePaye=?,Observation=?,recensement=? WHERE IM='$num' ");
                    $rec1->execute($table);
                    ?>
                <script type="text/javascript">
                    alert("Modification reuissie !");
                    window.location.href="index.php";
                </script><?php 
                    // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
            }
    
        }
        else if($validation=="0"){
            $valid=0;
            $numOrdreRecette=0;
            $montantValidation=0;
            $preCompteSoldes=0;
            $partiel=0;
            $integ=0;
            $nonPaye=0;
               
                $table=array($dateEntreAdmission,$dateIntegration,$dateTitularisation,$dateDepartRetraite,$valid,$numOrdreRecette,$montantValidation,$preCompteSoldes,$integ,$partiel,$datePaiments,$nonPaye,$observation,$recensement);
                $rec=$conn->prepare("UPDATE agent SET DateEntreAdmission=?,DateIntegration=?,DateTitularisation=?,DateDepartRetraite=?,`Validation`=?,NumOrdreRecette=?,MontantValidation=?,`PrecompteSolde`=?,Integral=?,Partiel=?,`DatePaiment`=?,NonEncorePaye=?,Observation=?,recensement=? WHERE IM='$num' ");
                $rec->execute($table);
                ?>
                <script type="text/javascript">
                    alert("Modification reuissie !");
                    window.location.href="index.php";
                </script><?php 
                // echo "Validation :".$valid." , N° Ordre :".$numOrdreRecette.", Montant:".$montantValidation.", Precompte solde :".$preCompteSoldes.", Partiel :".$partiel.", Date Paiement :".$datePaiments.", Integral :".$integ.", Nonencore payer".$nonPaye;
            }
    }
    
    
?>