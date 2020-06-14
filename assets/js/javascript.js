window.onload = function(){
    if(document.getElementById("baja").disabled==true){
        document.getElementById("baja").style.backgroundColor="grey";
    }
    rellenaSelect();
}

function compruebaBaja(){
    var botones = document.getElementsByName("cam[]");
    var len=botones.length;
    
     for( var x=0;x<len;x++){
       if(botones[x].checked==true){
           document.getElementById("baja").disabled=false;
           document.getElementById("baja").style.backgroundColor="black";
           break;
       }else{
           document.getElementById("baja").disabled=true;
           document.getElementById("baja").style.backgroundColor="grey";
       }
     }
}

