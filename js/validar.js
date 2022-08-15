
var nombre = document.getElementById("nombre");
var email = document.getElementById("correo");
var error = document.getElementById("error");
error.style.color = "red";
function enviarFormulario(){

    email = /^(([^<>()\[\]\.,;:\s@\”]+(\.[^<>()\[\]\.,;:\s@\”]+)*)|(\”.+\”))@(([^<>()[\]\.,;:\s@\”]+\.)+[^<>()[\]\.,;:\s@\”]{2,})$/;

    var mensajesError = [];
    if(nombre.value == "edwin" || email.value == "edwin@gmail.com"){
        alert("Ingreso Exitoso");
        window.location="index.html";

    }else if(nombre.value == "mario" || email.value=="papita@gmail.com"){
        alert("REGISTRO EXITOSO");

    }else if(nombre.value.length == 0){
        alert("El campo 'nombre' esta vacio");

    }else if( nombre.value.length >= 7){
        alert("El nombre es muy largo");

    }else if(nombre.value.length <=3){
        alert("El nombre es muy corto");

    }else if(!email.value.test(email)){
        alert("El correo es incorrecto");

    }else if(email.value.length == 0){
        alert("El campo 'correo' esta vacio");
    }
   
    error.innerHTML = mensajesError.join(", ");
    
    return false;

}
