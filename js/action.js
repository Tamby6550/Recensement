$(function() {
   $('#submitq').click(function(){
     var validation="";
     var types=document.getElementById('types').value;
     var dateEntreAdmission=document.getElementById('date1').value;
     var dateIntegration=document.getElementById('date2').value;
     var dateTitularisation=document.getElementById('date3').value;
     var dateDepartRetraite=document.getElementById('date4').value;
     var uadm=document.getElementById('uiadm').value;
     var observation=document.getElementById('comment').value;
     var preCompteSolde="";
     var num="";
     var nom="";
     var prenom="";
     var numOrdreRecette="";
     var montantValidation="";
     var integral="";
     var numMod="";
     var datePaiments="1900-01-01";
    if (types=="Ajout") {
        if (document.getElementById('ouis').checked) {
            validation="1";
           num=document.getElementById('num').value;
           nom=document.getElementById('nom').value;
           prenom=document.getElementById('prenom').value;
           if (document.getElementById('preCompteSolde').checked) {
               preCompteSolde="preCompteSolde";
           }
           else if(document.getElementById('preComptePublic').checked){
               preCompteSolde="preComptePublic";
           }
           else if(document.getElementById('nonPaye').checked){
               preCompteSolde="nonPaye";
           }
            numOrdreRecette=document.getElementById('ordre').value;
            montantValidation=document.getElementById('montant').value;
   
           if (document.getElementById('integral').checked) {
               integral="Integral";
           }
           else if(document.getElementById('partiel').checked){
               integral="Partiel";
               datePaiments=document.getElementById('visd').value;
           }
        }
        else if(document.getElementById('aze').checked){
           num=document.getElementById('num').value;
           nom=document.getElementById('nom').value;
           prenom=document.getElementById('prenom').value;
           validation="0";
        }
    }else if(types=="Recenser"){
        numMod=document.getElementById('numhh').value;
        if (document.getElementById('ouis').checked) {
            validation="1";
            numOrdreRecette=document.getElementById('ordre').value;
            montantValidation=document.getElementById('montant').value;
           if (document.getElementById('preCompteSolde').checked) {
               preCompteSolde="preCompteSolde";
           }
           else if(document.getElementById('preComptePublic').checked){
               preCompteSolde="preComptePublic";
           }
           else if(document.getElementById('nonPaye').checked){
               preCompteSolde="nonPaye";
           }
   
           if (document.getElementById('integral').checked) {
               integral="Integral";
           }
           else if(document.getElementById('partiel').checked){
               integral="Partiel";
               datePaiments=document.getElementById('visd').value;
           }
        }
        else if(document.getElementById('aze').checked){
            num=document.getElementById('num').value;
            nom=document.getElementById('nom').value;
            prenom=document.getElementById('prenom').value;
            validation="0";
         }
    }
     

    
    
     alert("Validation :"+validation+" , N° Ordre :"+numOrdreRecette+", Montant:"+montantValidation+", Precompte solde :"+preCompteSolde+", Partiel :"+integral+", Date Paiement :"+datePaiments+", Integral :"+integral+", Nonencore payer"+preCompteSolde)
   }); 
});