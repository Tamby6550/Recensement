<?php session_start(); 
 $localhost='localhost';
 $dbname='resencement';
 try {
    $conn= new PDO("mysql:host=$localhost;dbname=$dbname;charset=utf8","root","");
 } catch (PDOException $e) {
     die("Error" .$e->getMessage());
 }
 if(isset($_SESSION['UADM'])){ $uadms=$_SESSION['UADM'];$compte=$_SESSION["COMPTE"] ;?>
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
    <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    <!-- <script type="text/javascript" src="./js/action"></script> -->


    <title>Recensement</title>
    <style type="text/css" media="print">
    @page {
        size: landscape;
        margin: 1%;
    }
    </style>
    <style>
    #hovj:hover {
        background-color: #EEEEEE;
        cursor: pointer;
    }

    #loadingDiv {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transform: -webkit-translate(-50%, -50%);
        transform: -moz-translate(-50%, -50%);
        transform: -ms-translate(-50%, -50%);
        color: darkred;
    }

    #floatingBarsG {
        position: relative;
        width: 60px;
        height: 75px;
        margin: auto;
    }

    .blockG {
        position: absolute;
        background-color: rgb(255, 255, 255);
        width: 10px;
        height: 23px;
        border-radius: 8px 8px 0 0;
        -o-border-radius: 8px 8px 0 0;
        -ms-border-radius: 8px 8px 0 0;
        -webkit-border-radius: 8px 8px 0 0;
        -moz-border-radius: 8px 8px 0 0;
        transform: scale(0.4);
        -o-transform: scale(0.4);
        -ms-transform: scale(0.4);
        -webkit-transform: scale(0.4);
        -moz-transform: scale(0.4);
        animation-name: fadeG;
        -o-animation-name: fadeG;
        -ms-animation-name: fadeG;
        -webkit-animation-name: fadeG;
        -moz-animation-name: fadeG;
        animation-duration: 1.2s;
        -o-animation-duration: 1.2s;
        -ms-animation-duration: 1.2s;
        -webkit-animation-duration: 1.2s;
        -moz-animation-duration: 1.2s;
        animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        -ms-animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-direction: normal;
        -o-animation-direction: normal;
        -ms-animation-direction: normal;
        -webkit-animation-direction: normal;
        -moz-animation-direction: normal;
    }

    #rotateG_01 {
        left: 0;
        top: 27px;
        animation-delay: 0.45s;
        -o-animation-delay: 0.45s;
        -ms-animation-delay: 0.45s;
        -webkit-animation-delay: 0.45s;
        -moz-animation-delay: 0.45s;
        transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
    }

    #rotateG_02 {
        left: 8px;
        top: 10px;
        animation-delay: 0.6s;
        -o-animation-delay: 0.6s;
        -ms-animation-delay: 0.6s;
        -webkit-animation-delay: 0.6s;
        -moz-animation-delay: 0.6s;
        transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
    }

    #rotateG_03 {
        left: 25px;
        top: 3px;
        animation-delay: 0.75s;
        -o-animation-delay: 0.75s;
        -ms-animation-delay: 0.75s;
        -webkit-animation-delay: 0.75s;
        -moz-animation-delay: 0.75s;
        transform: rotate(0deg);
        -o-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
    }

    #rotateG_04 {
        right: 8px;
        top: 10px;
        animation-delay: 0.9s;
        -o-animation-delay: 0.9s;
        -ms-animation-delay: 0.9s;
        -webkit-animation-delay: 0.9s;
        -moz-animation-delay: 0.9s;
        transform: rotate(45deg);
        -o-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
    }

    #rotateG_05 {
        right: 0;
        top: 27px;
        animation-delay: 1.05s;
        -o-animation-delay: 1.05s;
        -ms-animation-delay: 1.05s;
        -webkit-animation-delay: 1.05s;
        -moz-animation-delay: 1.05s;
        transform: rotate(90deg);
        -o-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
    }

    #rotateG_06 {
        right: 8px;
        bottom: 7px;
        animation-delay: 1.2s;
        -o-animation-delay: 1.2s;
        -ms-animation-delay: 1.2s;
        -webkit-animation-delay: 1.2s;
        -moz-animation-delay: 1.2s;
        transform: rotate(135deg);
        -o-transform: rotate(135deg);
        -ms-transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
        -moz-transform: rotate(135deg);
    }

    #rotateG_07 {
        bottom: 0;
        left: 25px;
        animation-delay: 1.35s;
        -o-animation-delay: 1.35s;
        -ms-animation-delay: 1.35s;
        -webkit-animation-delay: 1.35s;
        -moz-animation-delay: 1.35s;
        transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
    }

    #rotateG_08 {
        left: 8px;
        bottom: 7px;
        animation-delay: 1.5s;
        -o-animation-delay: 1.5s;
        -ms-animation-delay: 1.5s;
        -webkit-animation-delay: 1.5s;
        -moz-animation-delay: 1.5s;
        transform: rotate(-135deg);
        -o-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        -moz-transform: rotate(-135deg);
    }



    @keyframes fadeG {
        0% {
            background-color: rgb(0, 0, 0);
        }

        100% {
            background-color: rgb(255, 255, 255);
        }
    }

    @-o-keyframes fadeG {
        0% {
            background-color: rgb(0, 0, 0);
        }

        100% {
            background-color: rgb(255, 255, 255);
        }
    }

    @-ms-keyframes fadeG {
        0% {
            background-color: rgb(0, 0, 0);
        }

        100% {
            background-color: rgb(255, 255, 255);
        }
    }

    @-webkit-keyframes fadeG {
        0% {
            background-color: rgb(0, 0, 0);
        }

        100% {
            background-color: rgb(255, 255, 255);
        }
    }

    @-moz-keyframes fadeG {
        0% {
            background-color: rgb(0, 0, 0);
        }

        100% {
            background-color: rgb(255, 255, 255);
        }
    }
    </style>
</head>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
const numStr = (a, b) => { //montant avec espace
    a = '' + a;
    b = b || ' ';
    var c = '',
        d = 0;
    while (a.match(/^0[0-9]/)) {
        a = a.substr(1);
    }
    for (var i = a.length - 1; i >= 0; i--) {
        c = (d != 0 && d % 3 == 0) ? a[i] + b + c : a[i] + c;
        d++;
    }
    return c;
}

function validations() {
    if (document.getElementById('aze').checked) {
        document.getElementById('ordre').disabled = true;
        document.getElementById('montant').disabled = true;
        document.getElementById('integral').disabled = true;
        document.getElementById('partiel').disabled = true;
        document.getElementById('visd').disabled = true;
        document.getElementById('preComptePublic').disabled = true;
        document.getElementById('preCompteSolde').disabled = true;
        document.getElementById('nonPaye').disabled = true;
    } else if (document.getElementById('ouis').checked) {
        document.getElementById('ordre').disabled = false;
        document.getElementById('montant').disabled = false;
        document.getElementById('preComptePublic').disabled = false;
        document.getElementById('preCompteSolde').disabled = false;
        document.getElementById('nonPaye').disabled = false;
    }
}

function regEx(num) {
    if (/^[0-9]+$/.test(num)) {
        return true
    } else {
        return false;
    }
}

function regExMo(num) {
    if (/^[0-9]+\.|[0-9]+$/.test(num)) {
        return true;
    } else {
        return false;
    }
}
$(function() {
    var d = new Date().toLocaleDateString({
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    })
    $('#dateAjr').html("DATE DU RECENSEMENT : <b>" + d + "</b>");
});

function admins() {
    if (document.getElementById('compteRec').value == 'admin' || document.getElementById('compteRec').value ==
        'superAdmin') {
        document.getElementById('suiviH').style.visibility = "visible";
    } else {
        document.getElementById('suiviH').style.visibility = "hidden";
    }
}
$(function() {
    $('#num').keyup(function() {
        var num = $('#num').val();
        $('#texta').css('color', 'black');
        if (regEx(num)) {
            $('#texta').css('color', 'green');
            return true;
        } else if (num == "") {
            $('#texta').css('color', 'black');
        } else {
            $('#texta').css('color', 'red');
            alert(
                "Erreur de saisie !\n\nChiffre sans espace (Exemple: 123456 ) \n\n Cliquez sur ok pour continuer ! "
            );
        }
    });
    $('#montant').keyup(function() {
        var num = $('#montant').val();

        if (regExMo(num)) {
            $('#textj').css('color', 'green');
            $('#montant').css('border-color', 'green');
            return true;
        } else if (num == "") {
            $('#textj').css('color', 'black');

        } else {
            $('#textj').css('color', 'red');
            $('#montant').css('border-color', 'red');
            $("#montant").val("");
            alert(
                "Erreur de saisie !\n\nChiffre  sans espace  et point au lieu de virgule (Exemple: 1452300.00 ) \n\n Cliquez sur ok pour continuer !"
            );
        }
    });
});

function execls(id, filename, incr) {
    var er = parseInt(incr);
    for (let index = 0; index < er; index++) {
        $("#impAct" + index + "a").css('visibility', 'hidden');
        $("#impAct" + index + "b").css('visibility', 'hidden');
    }
    $('#impAct1').css('visibility', 'hidden');
    $('#impAct2').css('visibility', 'hidden');
    $('#impAct3').css('visibility', 'hidden');
    exportTableToExcel(id, filename);

}

function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    //condition  Precisena ny nom fichier 
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {

        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        downloadLink.download = filename;

        downloadLink.click();
    }

}

function nouveauE() {
    $('#submitq').css('visibility', 'visible');
    $('#submitq').val('Ajouter un nouveau');
    $('#types').val('Ajout');
    $("#num").val("");
    $("#numhh").val("");
    $("#nom").val("");
    $("#prenom").val("");
    $("#date1").val(""); //date admission
    $("#date2").val(""); //date intégration
    $("#date3").val(""); //date titu
    $("#date4").val(""); //date départ
    $("#comment").val(""); //date départ
    $('#ordre').val("");
    $('#montant').val("");
    document.getElementById('preCompteSolde').checked = true;
    document.getElementById('integral').disabled = true;
    document.getElementById('partiel').disabled = true;
    document.getElementById('visd').disabled = true;
    document.getElementById('num').disabled = false;
    document.getElementById('nom').disabled = false;
    document.getElementById('prenom').disabled = false;
    document.getElementById('ouis').checked = false;
    document.getElementById('aze').checked = true;
    document.getElementById('ordre').disabled = true;
    document.getElementById('montant').disabled = true;
}

function showV(v, n) {
    $(document).scrollTop(450);
    var im = parseInt(v);
    $('#submitq').css('visibility', 'visible');
    $('#suppA').css('visibility', 'visible');
    $("#loadingDiv").css("display", "block");

    document.getElementById('aze').checked = true;
    document.getElementById('ordre').disabled = true;
    document.getElementById('montant').disabled = true;
    document.getElementById('preCompteSolde').disabled = true;
    document.getElementById('integral').disabled = true;
    document.getElementById('partiel').disabled = true;
    document.getElementById('nonPaye').disabled = true;
    document.getElementById('preComptePublic').disabled = true;
    document.getElementById('visd').disabled = true;
    $('#ordre').val("");
    $('#montant').val("");
    $.ajax({
        url: "modifie.php",
        type: "POST",
        data: 'im=' + im,
        dataType: "json",
        success: function(data) {
            // $('#bosyd').css("filter",'blur(0px)');
            $("#loadingDiv").css("display", "none");
            var name;
            $("#num").val("");
            $("#nom").val("");
            $("#prenom").val("");
            $("#date1").val(""); //date admission
            $("#date2").val(""); //date intégration
            $("#date3").val(""); //date titu
            $("#date4").val(""); //date départ
            $("#comment").val(""); //date départ
            $('#ordre').val("");
            $('#montant').val("");

            // console.log(data);
            for (name in data) {
                $("#num").val(data[name].IM);
                $("#numhh").val(data[name].IM);
                $("#nom").val(data[name].Nom);
                $("#prenom").val(data[name].Prenom);
                document.getElementById('num').disabled = true;
                document.getElementById('nom').disabled = true;
                document.getElementById('prenom').disabled = true;

                $("#date1").val(data[name].DateEntreAdmission); //date admission
                $("#date2").val(data[name].DateIntegration); //date intégration
                $("#date3").val(data[name].DateTitularisation); //date titu
                $("#date4").val(data[name].DateDepartRetraite); //date départ
                $("#comment").val(data[name].Observation); //date départ
                if (data[name].Validation == "1") {
                    document.getElementById('ouis').checked = true;
                    document.getElementById('ordre').disabled = false;
                    document.getElementById('montant').disabled = false;

                    $('#ordre').val(data[name].NumOrdreRecette);
                    $('#montant').val(data[name].MontantValidation);

                } else if (data[name].Validation == "0") {
                    document.getElementById('aze').checked = true;
                    document.getElementById('ordre').disabled = true;
                    document.getElementById('montant').disabled = true;
                    document.getElementById('preCompteSolde').disabled = true;
                    document.getElementById('integral').disabled = true;
                    document.getElementById('partiel').disabled = true;
                    document.getElementById('nonPaye').disabled = true;
                    document.getElementById('preComptePublic').disabled = true;
                    document.getElementById('visd').disabled = true;
                    $('#ordre').val("");
                    $('#montant').val("");
                }
                if (data[name].PrecompteSolde == "1") {
                    document.getElementById('preCompteSolde').checked = true;
                    document.getElementById('preCompteSolde').disabled = false;
                    document.getElementById('preComptePublic').disabled = false;
                    document.getElementById('nonPaye').disabled = false;
                    document.getElementById('integral').disabled = true;
                    document.getElementById('partiel').disabled = true;
                    document.getElementById('visd').disabled = true;
                } else if (data[name].PrecompteSolde == "0") {
                    if (data[name].Integral == "1") {
                        document.getElementById('preComptePublic').checked = true;
                        document.getElementById('integral').disabled = false;
                        document.getElementById('partiel').disabled = false;
                        document.getElementById('integral').checked = true;
                        document.getElementById('preCompteSolde').disabled = false;
                        document.getElementById('preComptePublic').disabled = false;
                        document.getElementById('nonPaye').disabled = false;
                    } else if (data[name].Partiel == "1") {
                        document.getElementById('preComptePublic').checked = true;
                        document.getElementById('partiel').checked = true;
                        document.getElementById('integral').disabled = false;
                        document.getElementById('partiel').disabled = false;
                        document.getElementById('visd').disabled = false;
                        document.getElementById('preCompteSolde').disabled = false;
                        document.getElementById('preComptePublic').disabled = false;
                        document.getElementById('nonPaye').disabled = false;
                        $('#visd').val(data[name].DatePaiment);
                    } else if (data[name].NonEncorePaye == "1") {
                        document.getElementById('integral').disabled = true;
                        document.getElementById('partiel').disabled = true;
                        document.getElementById('visd').disabled = true;
                        document.getElementById('nonPaye').checked = true;
                        document.getElementById('preCompteSolde').disabled = false;
                        document.getElementById('preComptePublic').disabled = false;
                        document.getElementById('nonPaye').disabled = false;
                    }
                }
                $('#submitq').val(n);
                $('#types').val('Recenser');
            }
        }
    });
}
$(document).ready(function() {
    $('#nonRecenser').DataTable();
});

// Supprimer un agent

function suppT() {
    var im = $('#numhh').val();
    if (confirm("Vous voulez supprimer vraiment cet agent?")) {
        $("#loadingDiv").css("display", "block");
        $.ajax({
            url: "supprimer.php",
            type: "POST",
            data: 'im=' + im,
            dataType: "html",
            success: function(data) {
                $("#loadingDiv").css("display", "none");
                alert(data);
                window.location.href = "index.php";
            }
        });
    } else {
        return false;
    }
}
//  Changement mot de passe
function change() {
    var uadm = $('#uiadm').val();
    var news = $('#nouveaumot').val();
    var anceinse = $('#ancienmot').val();
    $("#loadingDiv").css("display", "block");
    $.ajax({
        url: "change.php",
        type: "POST",
        data: 'uadm=' + uadm + '&& new=' + news + '&& encien=' + anceinse,
        dataType: "json",
        success: function(data) {
            $("#loadingDiv").css("display", "none");
            console.log(data);
            $('#nouveaumot').val('');
            $('#ancienmot').val('');
            if (data.status == '1') {
                alert(data.Message);
                window.location.href = "deconnexion.php";
            } else if (data.status == '0') {
                alert(data.Message);
            }
        }
    });
}
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
});

//Recherche tableau
$(function() {
    $('#suiviH').click(function() {
        window.location.href = "ListRecense.php";
    })
    $('#recherche').keyup(function() {
        var vf = 1;
        im = $('#recherche').val();
        uadm = $('#uiadm').val();
        $("#loadingDiv").css("display", "block");
        if (im != "") {
            vf = 1;
        } else {
            vf = 0;
            window.location.href = "index.php";
        }
        $.ajax({
            url: "Recherche.php",
            type: "POST",
            data: 'im=' + im + '&& uadm=' + uadm + '&& vf=' + vf,
            dataType: "json",
            success: function(data) {
                var name, contenu = "",
                    validation, MontantValidation, PrecompteSolde, Partiel, Integral, dateP,
                    NonEncorePaye, f, r;
                for (name in data) {
                    if (data.status == '0') {
                        contenu = contenu +
                            "<tr><td class='tg-0pky' colspan='16' ><center> Aucun(0) resultat. </center> </td> </tr>";
                    } else {
                        //condition
                        console.log(data[name]);
                        if (data[name].Validation == 0) {
                            validation =
                                "<td class='tg-0pky'></td> <td class='tg-0pky'>Oui</td>";
                        } else if (data[name].Validation == 1) {
                            validation =
                                "<td class='tg-0pky'>Oui</td> <td class='tg-0pky'></td>";
                        }
                        if (data[name].MontantValidation == 0) {
                            MontantValidation =
                                "<td class='tg-0pky'></td> <td class='tg-0pky'></td>";
                        } else if (data[name].MontantValidation != 0) {
                            MontantValidation = "<td class='tg-0pky'>" + data[name]
                                .NumOrdreRecette + "</td> <td class='tg-0pky'>" + numStr(
                                    data[name]
                                    .MontantValidation) + "</td>";
                        }
                        if (data[name].PrecompteSolde == 1) {
                            PrecompteSolde = "<td class='tg-0pky'>Oui</td>";
                        } else if (data[name].PrecompteSolde == 0) {
                            PrecompteSolde = "<td class='tg-0pky'></td>";
                        }
                        if (data[name].Partiel == 1) {
                            Partiel = "<td class='tg-0pky'>Oui</td>";
                        } else if (data[name].Partiel == 0) {
                            Partiel = "<td class='tg-0pky'></td>";
                        }
                        if (data[name].Integral == 1) {
                            Integral = "<td class='tg-0pky'>Oui</td>";
                        } else if (data[name].Integral == 0) {
                            Integral = "<td class='tg-0pky'></td>";
                        }
                        if (data[name].Partiel == 1 && data[name].DatePaiment != "") {
                            dateP = "<td class='tg-0pky'>" + data[name].DatePaiment +
                                "</td>";
                        } else if (data[name].Partiel == 0) {
                            dateP = "<td class='tg-0pky'></td>";
                        }
                        if (data[name].NonEncorePaye == 1) {
                            NonEncorePaye = "<td class='tg-0pky'>Oui</td>";
                        } else if (data[name].NonEncorePaye == 0) {
                            NonEncorePaye = "<td class='tg-0pky'></td>";
                        }
                        //Fin condition
                        contenu = contenu + "<tr onclick=showV('" + data[name].IM +
                            "','Modifier') id='hovj' data-toggle='tooltip' title='Cliquez içi pour modifier' >" +
                            "<td>" + data[name].IM + "</td>" +
                            "<td>" + data[name].Nom + "</td>" +
                            "<td>" + data[name].Prenom + "</td>" +
                            "<td>" + data[name].DateEntreAdmission + "</td>" +
                            "<td>" + data[name].DateIntegration + "</td>" +
                            "<td>" + data[name].DateTitularisation + "</td>" +
                            "<td>" + data[name].DateDepartRetraite + "</td>" + validation +
                            MontantValidation + PrecompteSolde + Partiel + Integral +
                            dateP +
                            NonEncorePaye + "</tr>";
                    }

                }
                $('#bodys').html(contenu);
                $("#loadingDiv").css("display", "none");
                // console.log(contenu);
            }
        });
    })
})
</script>

<body style="background-color:White" onload="admins()">
    <div class="container-fluid pt-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Recensement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <i class="bi-alarm"></i>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" action="pdf.php" method="POST">


                    <button type="button" class="btn btn-secondary mr-2" id="suiviH" style="visibility:hidden">
                        Reporting
                    </button>
                    <input type="submit" value="Voir tutoriel" class="btn btn-danger mr-2">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Changer mot de passe
                    </button>
                    <a href="deconnexion.php" style="color:white" class="btn btn-outline-danger my-2 ml-3 my-sm-0"
                        type="submit">Déconnexion</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Changement de mot de passe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="password" id="ancienmot" class="form-control"
                                        placeholder="Ancien mot de passe...">
                                    <input type="password" id="nouveaumot" class="form-control"
                                        placeholder="Nouveau mot de passe...">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Quitter</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="change()">Modification</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal suivie -->

                    <!-- Chargement -->

                </form>
            </div>
        </nav>

        <div class="container-fluid mt-3">
            <div class="col-sm-12" style="color:#71757a">
                <?php 
                        $re=$conn->query("SELECT LIBELLE_MINISTERE,Nom from login where UADM='$uadms'");
                        if ($re) { while ($dat=$re->fetch()) {?>
                <h6> MINISTERE : <b><?php echo $dat['LIBELLE_MINISTERE'] ?></b>
                    <h6>
                        <h6>UADM : <i><b><?php  echo $_SESSION['UADM'] ?></b></i></h6>
                        <h6> NOM : <b><?php echo $dat['Nom'] ?></b>
                            <h6>
                                <?php  }}?>
            </div>
            <hr>
            <?php $reqa=$conn->query("SELECT * FROM `agent` where recensement='0' and UADM='$uadms' "); if ($reqa) {?>
            <div class="table-responsive">
                <center>
                    <h4 style="color:#444444">LISTE DES AGENTS A RECENSER</h4>
                </center>

                <table id="nonRecenser" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>IM</th>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>Date d'entrée dans l'Administration</th>
                            <th>Date d'intégration</th>
                            <th>Date de titularisation</th>
                            <th>Date de départ à la retraite</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($data=$reqa->fetch()) {?>
                        <tr>
                            <td><?php echo $data['IM']?></td>
                            <td><?php echo ucfirst($data['Nom'])?></td>
                            <td><?php echo ucfirst($data['Prenom'])?></td>
                            <td><?php echo ucfirst($data['DateEntreAdmission'])?></td>
                            <td><?php echo ucfirst($data['DateIntegration'])?></td>
                            <td><?php echo ucfirst($data['DateTitularisation'])?></td>
                            <td><?php echo ucfirst($data['DateDepartRetraite'])?></td>
                            <td><button id="recenser" onclick="showV('<?php echo $data['IM']?>','Recenser')"
                                    class="btn btn-info">Recenser</button></td>
                        </tr>
                        <?php }  } ?>
                    </tbody>
                </table>
                </section>

                <!-- <label class="btn btn-primary" id="nouveaus" onclick="nouveauE()">Ajouter un nouveau agent</label> -->
            </div>
            <hr>

            <!-- Form ajout -->
            <section id="form_section">
                <form action="Actionne.php" id="ajt" method="post" id="bosyd">
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h4 style="color:#444444">FORMULAIRE DU RECENSEMENT</h4>
                            </center>
                        </div>
                        <div class="col-sm-6">
                            <fieldset class="pl-2 pr-2 shadow-sm">
                                <legend>Information Agent</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="num">Numéro matricule</label>
                                        <input type="text" class="form-control" id="num" placeholder="Immatricule"
                                            name="num" required>
                                        <input type="hidden" name="numh" id="numhh">
                                        <small><b id="texta"><i>NB: Numéro matricule sans espace (Exemple: 123456 )</i>
                                            </b></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prenom">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" placeholder="Prenom"
                                            name="prenom" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date1">Date d'entrée dans l'administration</label>
                                        <input type="date" class="form-control" id="date1"
                                            placeholder="Date d'entrée admission" name="dateEntreAdmission" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date2">Date d'intégration</label>
                                        <input type="date" class="form-control" id="date2"
                                            placeholder="Date d'intégration" name="dateIntegration" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date3">Date de titularisation</label>
                                        <input type="date" class="form-control" id="date3"
                                            placeholder="Date de titularisation" name="dateTitularisation" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date4">Date de départ à la retraite</label>
                                        <input type="date" class="form-control" id="date4"
                                            placeholder="Date de départ à la retraite" name="dateDepartRetraite"
                                            required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Validation Effectue -->

                        <div class="col-sm-6">
                            <fieldset class="pl-2 pr-2 shadow-sm">
                                <legend>Validation Effectuée</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="num">Validation effectue : </label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="validation" id="ouis"
                                                value="1" onClick="validations()">
                                            <label class="form-check-label" for="inlineRadio1">Oui</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="validation" id="aze"
                                                value="0" onClick="validations()" checked>
                                            <label class="form-check-label" for="inlineRadio2">Non</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Nom">N° Ordre de Recette</label>
                                        <input type="text" class="form-control" id="ordre" disabled
                                            placeholder="N° Ordre de Recette" name="numOrdreRecette" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Prenom">Montant de la Validation</label>
                                        <input type="text" class="form-control" id="montant"
                                            placeholder="Montant de la Validation" name="montantValidation" disabled
                                            required>
                                        <small id="textj"><b> <i>NB: Montant sans espace et point(.) au lieu de
                                                    virgule(,) &nbsp;&nbsp;&nbsp; (Exemple: 1125500.00 )</i></b></small>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Paiement de la validation -->

                            <fieldset class="pl-2 pr-2 mt-3 shadow-sm">
                                <legend>Paiement de la validation</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <div class="form-check pl-4">
                                            <input class="form-check-input" type="radio" name="preCompteSolde"
                                                id="preCompteSolde" value="preCompteSolde"
                                                onClick="radioDesactive() && visib()" checked disabled>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <b>Precompte du solde</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="preCompteSolde"
                                                id="preComptePublic" value="preComptePublic"
                                                onClick="radioDesactive()&&visib()" disabled>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <b>Paiement au tresors public</b>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="integral" id="integral"
                                                value="Integral" checked disabled onClick="visib()" disabled>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Integral
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="integral" id="partiel"
                                                value="Partiel" disabled onClick="visib()" disabled>
                                            <label class="form-check-label" for="exampleRadios2">
                                                Partiel
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="Prenom">Date de paiement</label>
                                            <input type="date" id="visd" disabled class="form-control"
                                                placeholder="Montant de la Validation" name="datepaiement" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="preCompteSolde"
                                                id="nonPaye" value="nonPaye" onClick="radioDesactive()" disabled>
                                            <label class="form-check-label" for="exampleRadios1">
                                                <b>Non encore payé</b>
                                            </label>
                                            <input type="hidden" name="uadm" id="uiadm"
                                                value="<?php echo $_SESSION['UADM']; ?>">
                                            <input type="hidden" name="compte" id="compteRec"
                                                value="<?php echo $_SESSION['COMPTE']; ?>">
                                        </div>
                                    </div>
                            </fieldset>
                        </div>

                        <div class="col-sm-6">
                            <fieldset class="pl-2 pr-2 shadow-sm">
                                <legend>Observation</legend>
                                <div class="form-group">
                                    <label for="comment">Observation :</label>
                                    <textarea class="form-control" rows="5" id="comment" name="observation"></textarea>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-6 pt-5">
                            <div class="form-row">
                                <div class="form-group col-md-12" id="btn">
                                    <input type="hidden" name="typesa" value="Ajout" id="types">
                                    <center><input type="submit" id="submitq" class="btn btn-success btn-lg btn-block"
                                            value="Ajouter un nouveau" />
                                    </center>
                                    <br>
                                    <center><label id="suppA" class="btn btn-danger btn-lg btn-block"
                                            style="visibility:hidden" onclick="suppT()"> Supprimer </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                </form>
            </section>

            <?php 
            $reqa=$conn->query("SELECT * FROM `agent` where recensement='1' and UADM='$uadms'  "); if ($reqa) {?>
            <div class="table-responsive">
                <hr><br><br>
                <center>
                    <h4 style="color:#444444">LISTE DES AGENTS RECENSES</h4>
                </center>
                <label for="">Recherche :</label><input type="text" id="recherche" class="form-control mb-3"
                    placeholder="Recherche par N° Immatriculation..." style="width:300px">
                <div id="impr">
                    <?php  
                    $re=$conn->query("SELECT LIBELLE_MINISTERE,Nom from login where UADM='$uadms'");
                    if ($re) { while ($dat=$re->fetch()) {?>
                    <div style="margin-top:20px;margin-left:10px">
                        <h6>MINISTERE : <b><?php echo $dat['LIBELLE_MINISTERE'] ?></b></h6>
                        <h6>UADM : <b><?php  echo $_SESSION['UADM'] ?></b></h6>
                        <h6> NOM : <b><?php echo $dat['Nom'] ?></b>
                            <h6>
                                <center>
                                    <h6 id="dateAjr"></h6>
                                </center> <br><br>
                    </div>

                    <?php  }}?>
                    <table id="recensers" style="margin-left:3px" class="tg table table-bordered">
                        <thead>
                            <tr>
                                <th class="tg-0pky" rowspan="2"><label style="position:relative;bottom:50px">IM</label>
                                </th>
                                <th class="tg-0pky" rowspan="2"><label style="position:relative;bottom:50px">NOM</label>
                                </th>
                                <th class="tg-0pky" rowspan="2"><label
                                        style="position:relative;bottom:50px">PRENOM</label></th>
                                <th class="tg-0pky" rowspan="2"><label style="position:relative;bottom:35px">Date
                                        d'entree dans l'Administration</label></th>
                                <th class="tg-0pky" rowspan="2"><label style="position:relative;bottom:42px">Date
                                        d'integration</label></th>
                                <th class="tg-0pky" rowspan="2"><label style="position:relative;bottom:50px">Date de
                                        titularisation</label></th>
                                <th class="tg-0pky" id="retr" rowspan="2"><label
                                        style="position:relative;bottom:35px">Date de depart à la retraite</label></th>
                                <th class="tg-0pky" style="text-align:center" colspan="4">SI VALIDATION EFFECTUEE<br>
                                </th>
                                <th class="tg-0pky" style="text-align:center" colspan="5">PAIEMENT DE LA VALIDATION</th>
                            </tr>
                            <tr>
                                <td class="tg-0pky">oui</td>
                                <td class="tg-0pky">Non</td>
                                <td class="tg-0pky">Numero ordre de recette</td>
                                <td style="padding:31px">Montant </td>
                                <td class="tg-0pky">Paiement par precompte sur solde</td>
                                <td class="tg-0pky">PARTIEL</td>
                                <td class="tg-0pky">INTEGRAL</td>
                                <td class="tg-0pky">DATE DE PAIEMENT</td>
                                <td class="tg-0pky">NON ENCORE PAYE</td>
                            </tr>
                        </thead>
                        <tbody id="bodys">
                            <?php $i=0; while ($data=$reqa->fetch()) {?>
                            <tr onclick="showV('<?php echo $data['IM']?>','Modifer')" id="hovj" data-toggle="tooltip"
                                title="Cliquez içi pour modifier">
                                <td class="tg-0pky"><?php echo $data['IM'] ?> </td>
                                <td class="tg-0pky"><?php echo $data['Nom'] ?> </td>
                                <td class="tg-0pky"><?php echo $data['Prenom'] ?> </td>
                                <td class="tg-0pky">
                                    <?php echo  implode('/',array_reverse  (explode('-',$data['DateEntreAdmission']))); ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo implode('/',array_reverse  (explode('-',$data['DateIntegration']))); ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo implode('/',array_reverse  (explode('-',$data['DateTitularisation']))); ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  implode('/',array_reverse  (explode('-',$data['DateDepartRetraite']))); ?>
                                </td>
                                <!-- Validation -->
                                <?php if ($data['Validation']==0) {
                               echo " <td class='tg-0pky'></td> <td class='tg-0pky'>Oui</td>";
                            }else if($data['Validation']==1){
                                echo " <td class='tg-0pky'>Oui</td> <td class='tg-0pky'></td>";
                            }
                            ?>
                                <!-- N° orcdre de recette et montant -->
                                <?php if ($data['MontantValidation']==0) {
                               echo " <td class='tg-0pky'></td> <td class='tg-0pky'></td>";

                            }else if($data['MontantValidation']!=0){
                                echo " <td class='tg-0pky'>".$data['NumOrdreRecette']."</td> <td class='tg-0pky'><center>". number_format($data['MontantValidation'],2,',', ' ')." </center></td>";
                            }
                            ?>
                                <!-- Preécompte -->
                                <?php if ($data['PrecompteSolde']==1) {
                               echo " <td class='tg-0pky'>Oui</td>";

                            }else if($data['PrecompteSolde']==0){
                                echo "<td class='tg-0pky'></td>";
                            }
                            ?>
                                <!-- Partiel -->
                                <?php if ($data['Partiel']==1) {
                               echo " <td class='tg-0pky'>Oui</td>";

                            }else if($data['Partiel']==0){
                                echo "<td class='tg-0pky'></td>";
                            }
                            ?>
                                <!-- Integral -->
                                <?php if ($data['Integral']==1) {
                               echo " <td class='tg-0pky'>Oui</td>";

                            }else if($data['Integral']==0){
                                echo "<td class='tg-0pky'></td>";
                            }
                            ?>
                                <!-- Date paiement -->
                                <?php if ($data['Partiel']==1 && $data['DatePaiment'] !="") {
                               echo " <td class='tg-0pky'>".implode('/',array_reverse  (explode('-',$data['DatePaiment'])))."</td>";// Manova date php (aaaa-mm-jj) ho jj/mm/aaaa

                            }else if($data['Partiel']==0 ){
                                echo "<td class='tg-0pky'></td>";
                            }
                            ?>
                                <!-- Non Encore paye -->
                                <?php if ($data['NonEncorePaye']==1 ) {
                               echo " <td class='tg-0pky'>Oui</td>";

                            }else if($data['NonEncorePaye']==0 ){
                                echo "<td class='tg-0pky'></td>";
                            }
                            ?>
                            </tr>
                            <?php $i++; }  } ?>
                        </tbody>
                    </table>
                    <!-- Table vao -->
                </div>
                <label class="btn btn-success"
                    onclick="execls('impr','<?php echo $uadms; ?>','<?php echo $i; ?>')">Export
                    Excel du recensement</label>
            </div>
        </div>
        <footer class="main-footer" style="margin-left:0px;background-color:#ECF0F5">
            <div class="container">
                <div class="pull-right hidden-xs">
                </div>
                <strong>Copyright © juin 2021 <a data-toggle="tooltip" title="Tamby Arimisa">TM</a>.</strong> Tous
                droits réservés.
            </div>
            <!-- /.container -->
        </footer>
        <!-- chargement -->
        <div id="loadingDiv">
            <strong style="color:Black">Chargement ...</strong>
            <div id="floatingBarsG">
                <div class="blockG" id="rotateG_01"></div>
                <div class="blockG" id="rotateG_02"></div>
                <div class="blockG" id="rotateG_03"></div>
                <div class="blockG" id="rotateG_04"></div>
                <div class="blockG" id="rotateG_05"></div>
                <div class="blockG" id="rotateG_06"></div>
                <div class="blockG" id="rotateG_07"></div>
                <div class="blockG" id="rotateG_08"></div>
            </div>
        </div>
    </div>
</body>
<?php }  else{  header("location:Login.php");}?>