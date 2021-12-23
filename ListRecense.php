<?php session_start(); 
 $localhost='localhost';
 $dbname='resencement';
 try {
    $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
 } catch (PDOException $e) {
     die("Error" .$e->getMessage());
 }
 if(isset($_SESSION['UADM'])&&($_SESSION['COMPTE']=='admin'||$_SESSION['COMPTE']=='superAdmin')){ 
     $uadms=$_SESSION['UADM'];
     $region=$_SESSION['REGION'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="./js/script.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./css/bootstrap-chosen.css">
    <!-- <script type="text/javascript" src="js/jquery-3.4.1.js"></script> -->
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/buttons.print.min.js"></script>
    <!-- <script type="text/javascript" src="./js/action"></script> -->
    <title>Recensement</title>
</head>
<script>
$(function() {
    $('#btnretour').click(function() {
        window.location.href = "index.php";
    });
})


$(document).ready(function() {
    $('#nonRecenser').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'print'
        ]
    } );
} );

</script>

<body style="background-color:White" onload="admins()">
    <div class="container-fluid pt-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <form class="form-inline my-2 my-lg-0">
                <input type="button" value="Retour à la page d'accueil" id="btnretour" class="btn btn-danger mr-2">
            </form>
            <a class="navbar-brand ml-12" href="#">Liste des agents recensés par UADM </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <i class="bi-alarm"></i>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="container-fluid mt-3">
            <?php 
            $reqa='';
            if ($_SESSION['COMPTE']=='admin') {
                $reqa=$conn->query("SELECT login.REGION as region, login.LIBELLE_MINISTERE as nomMin,login.NOM as nom,count(agent.recensement) as nombre FROM `agent`,`login` where login.UADM=agent.UADM and agent.recensement='1' and login.REGION='".$region."' group by login.UADM"); 
            }else if($_SESSION['COMPTE']=='superAdmin'){
                $reqa=$conn->query("SELECT login.REGION as region, login.LIBELLE_MINISTERE as nomMin,login.NOM as nom,count(agent.recensement) as nombre FROM `agent`,`login` where login.UADM=agent.UADM and agent.recensement='1'  group by login.UADM"); 
            }
            if ($reqa) {?>
            <table id="nonRecenser" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Région</th>
                        <th>Ministère</th>
                        <th>UADM</th>
                        <th>Nombre Recensé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($data=$reqa->fetch()) {?>
                    <tr>
                        <td><?php echo $data['region']?></td>
                        <td><?php echo ucfirst($data['nomMin'])?></td>
                        <td><?php echo ucfirst($data['nom'])?></td>
                        <td><?php echo ucfirst($data['nombre'])?></td>
                    </tr>
                    <?php }  } ?>
                </tbody>
                <tfoot>
                    <hr>
                    <?php 
                    if ($_SESSION['COMPTE']=='admin') {
                        $reqa=$conn->query("SELECT count(agent.recensement) as nombres FROM `agent`,login where  agent.recensement='1' and login.REGION='".$region."' and  login.UADM=agent.UADM ");
                    }
                    else if($_SESSION['COMPTE']=='superAdmin'){
                        $reqa=$conn->query("SELECT count(agent.recensement) as nombres FROM `agent`,login where  agent.recensement='1'  and  login.UADM=agent.UADM ");
                    }
                     if ($reqa) {
                        while($data=$reqa->fetch()) {
                            if ($_SESSION['COMPTE']=='admin') {
                    ?>
                    <b>
                        <h4>Nombres totals des agents recensés : <?php echo $data['nombres']; ?> dans la région
                            <?php echo $region; ?> </h4>
                    </b>
                    <?php
                        }
                        else if($_SESSION['COMPTE']=='superAdmin'){ ?>
                    <b>
                        <h4>Nombres totals des agents recensés : <?php echo $data['nombres']; ?> par régions </h4>
                    </b>
                    <?php  }
                        }  }
                    ?>
                </tfoot>
            </table>
        </div>
</body>
<?php }  else{  header("location:Login.php");}?>