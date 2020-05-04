
/*VARIABLES*/
var cartatabla = document.getElementById("rellenaCarta");

var tablaprove = document.getElementById("tablaproveedores");
var selectprov = document.getElementById("prov");

var platomod= document.getElementById("platomod");
var selectplato = document.getElementById("listaplatos");

function inicializa_xhr() {
    if(window.XMLHttpRequest) {
    return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
    }
    }

    /*FUNCIONES PARA LA CARTA*/ 
    function cargaCarta(){
      cartatabla.innerHTML="";
      var e = document.getElementById("selec");
      var value = e.options[e.selectedIndex].value;
         peticion=inicializa_xhr();
         
            if(peticion){
          peticion.onreadystatechange = procesaCarta;
          peticion.open("POST","carta.php",true);
          peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          peticion.send("tipo="+encodeURIComponent(value)+"&nocache="+Math.random());
              } 
   }

   function procesaCarta(){
  
    if(peticion.readyState==4){
        
            if(peticion.status==200){
                  
                    var respuesta = peticion.responseText;
                    var carta = respuesta.split(",");

                    for(var x=0;x<carta.length;x++){
                      cartatabla.innerHTML+=carta[x];
                    }
                        
                   }
                }
            }

            /*FUNCIONES PARA LOS PROVEEDORES*/


function rellenaSelect(){
 
  peticionprov=inicializa_xhr();
         
            if(peticionprov){
             
          peticionprov.onreadystatechange = procesaSelect;
          peticionprov.open("GET","selectprov.php",true);
          //peticionprov.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          peticionprov.send();
  }
}


function procesaSelect(){
 
  if(peticionprov.readyState==4){
    
    if(peticionprov.status==200){
      
           var respuesta = peticionprov.responseText;

         

            var listado = respuesta.split(",");

            for(var x=0;x<listado.length;x++){
              selectprov.innerHTML+=listado[x];
            }
               
           }
        }
}

function rellenaTabla(){
  tablaprove.innerHTML="";
  var value = selectprov.value;
  
  
     peticiontabla=inicializa_xhr();
     
        if(peticiontabla){
      peticiontabla.onreadystatechange = procesaTabla;
      peticiontabla.open("POST","mostrarprov.php",true);
      peticiontabla.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      peticiontabla.send("id="+encodeURIComponent(value)+"&nocache="+Math.random());
          } 
}

function procesaTabla(){
  
  if(peticiontabla.readyState==4){
    
    if(peticiontabla.status==200){
      
           tablaprove.innerHTML = peticiontabla.responseText;

           }
        }
}

/*FUNCIONES PARA LOS PLATOS*/

function modificaPlato(){

      platomod.innerHTML="";
      var value= selectplato.value;

      peticionplato=inicializa_xhr();

      if(peticionplato){
        peticionplato.onreadystatechange=procesaPlato;
        peticionplato.open("POST","muestraplato.php",true);
        peticionplato.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticionplato.send("id="+encodeURIComponent(value)+"&nocache="+Math.random());
      }
}

function procesaPlato(){
  
  if(peticionplato.readyState==4){
    
    if(peticionplato.status==200){
      
           platomod.innerHTML = peticionplato.responseText;

           }
        }
}