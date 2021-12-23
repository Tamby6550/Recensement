<html lang="en">
<?php  
    $localhost='localhost';
    $dbname='resencement';
    try {
        $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
    } catch (PDOException $e) {
        die("Error" .$e->getMessage());
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.js"></script>
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <script src="./js/logins.js"></script>
    <link rel="stylesheet" href="./css/bootstrap-chosen.css">
    <title>Recensement</title>
</head>
<style>
body {
    background-image: url("fond.jpeg");
}
</style>
<script>
$(function() {
    $('#nomMins').change(function() {
        code = $('#nomMins').val();
        region = $('#region').val();
        $("#nomLieu").html("<option value=''>Chargement...</option>");
        $.ajax({
            url: "GetPage.php",
            type: "POST",
            data: 'code=' + code + "&& regions=" + region,
            dataType: "json",
            success: function(data) {
                var pag = "<option value=''></option>";
                $("#nomLieu").html("<option value=''></option>");
                $("#nomz").val("");
                $("#noms").val("");
                for (let name = 0; name < data.length; name++) {
                    pag = pag + "<option value='" + data[name].Nom + "'>" + data[name].Nom +
                        "</option>";
                }
                $(function() {
                    $('.chosen-selects').chosen();
                });
                $("#nomLieu").html(pag);
            }
        });
    });
    $('#nomLieu').change(function() {
        nomL = $('#nomLieu').val();
        code = $('#nomMins').val();
        region = $('#region').val();
        document.getElementById('tesy').innerHTML = "";
        document.getElementById('tesy').innerHTML = "<strong>Chargement...</strong>";
        $.ajax({
            url: "Uadm.php",
            type: "POST",
            data: 'nom=' + nomL + "&& code=" + code + "&& regions=" + region,
            dataType: "json",
            success: function(data) {
                var name;
                $("#uadm").val("");
                for (name in data) {
                    document.getElementById('tesy').innerHTML = "<strong>" + data[name]
                        .UADM + "</strong>";
                    $("#uadm").val(data[name].UADM);
                }
            }
        });
    });
    $('#region').change(function() {
        region = $('#region').val();
        $("#nomMins").html("<option value=''>Chargement...</option>");
        $.ajax({
            url: "Region.php",
            type: "POST",
            data: 'regions=' + region,
            dataType: "json",
            success: function(data) {
                var name, pag = "<option value=''></option>";
                $("#nomMins").html("<option value=''></option>");
                console.log(data)
                for (let name = 0; name < data.length; name++) {
                    pag = pag + "<option value='" + data[name].codes + "'>" + data[name]
                        .nomMin + "</option>";
                }
                $(function() {
                    $('.chosen-select').chosen();
                });
                $("#nomMins").html(pag);
            }
        });
    });
});

$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})
</script>

<body style="background-image: url('fond.jpeg'); background-size: 1700px 1000px;height:100px ">

    <body class="hold-transition login-page ">
        <div class="login-box">
            <div class="login-logo" style="color:#444444">
                <h1><b>Recensement</b></h1>
                <h3>en matière de</h3>
                <h3>VALIDATION DES SERVICES PRECAIRES</h3>
            </div>
            <div class="login-box-body"
                style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <p class="login-box-msg">Authentification</p>
                <form action="Loginaction.php" method="post">
                    <!-- Region -->
                    <div class="form-group has-feedback">
                        Region :
                        <select id="region" class="form-control" name="region" required>
                            <option value=""></option>
                            <?php 
                            $re=$conn->query("SELECT distinct REGION  from login ");
                            if ($re) {
                            while ($dat=$re->fetch()) {
                            ?>
                            <option value="<?php  echo $dat['REGION'] ?>"><?php  echo $dat['REGION'] ?></option>
                            <?php  }}?>
                        </select>
                    </div>
                    <!-- Fin Region -->
                    <!-- NOM Ministere -->
                    <div class="form-group has-feedback">
                        Ministère :
                        <select id="nomMins" data-placeholder="Nom Ministere:" class="chosen-select form-control"
                            name="nom_ministere" required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        UADM :
                        <select id="nomLieu" data-placeholder="NOM UADM:" class="chosen-selects form-control" name="nom"
                            required>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <center>
                            <p id="tesy"></p>
                        </center>
                        <input type="hidden" name="uadm" id="uadm">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="MOT DE PASSE..." name="mdp" required>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary " style="float:right">Connexion</button>

                        </div>

                    </div>

                </form>
            </div>
    </body>

</html>