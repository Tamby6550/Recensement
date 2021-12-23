function radioDesactive() {
    if(document.getElementById('preCompteSolde').checked){
        document.getElementById('integral').disabled =true;
        document.getElementById('partiel').disabled =true;
        document.getElementById('visd').disabled =true;
    }
    else if(document.getElementById('preComptePublic').checked){
        document.getElementById('integral').disabled =false;
        document.getElementById('partiel').disabled =false;
    }
    else if(document.getElementById('nonPaye').checked){
        document.getElementById('integral').disabled =true;
        document.getElementById('partiel').disabled =true;
        document.getElementById('visd').disabled =true;
    }
}

function visib() {
    if (document.getElementById('partiel').checked) {
        document.getElementById('visd').disabled =false;
    }
    else if(document.getElementById('preComptePublic').checked){
        document.getElementById('visd').disabled =true;
    }
}

function regEx(num) {
  if(/^[0-9][.][0-9]+$/.test(num)){
    return true
  }else{
    return false;
  }
}