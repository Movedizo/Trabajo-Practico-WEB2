document.addEventListener(`DOMContentLoaded`, iniciar)
function iniciar() {
    
"user strict"

//Aca intento traer el id_reacondicionado que tenemos en smarty
//let idComent = document.getElementById("idComent");
//console.log(idComent); 

let urlApi = "api/comentarios/50";


let app = new Vue({
    el: "#comentspace",
    data: {
        titulo: "Caja de comentarios",
        subtitulo: "Aqui Van Los Comentarios",
        comentarios: [] },   //En este arreglo se guarda el objeto que me trae el fetch
}); 

async function getComents() {
    try {
        let response = await fetch(urlApi);
        let comentarios = await response.json();
        
        app.comentarios = comentarios;
  
    } catch (e) {
        console.log(e);
    }
console.log(app.comentarios)
}
getComents();

//Crear comentarios, sigo sin poder capturar el id que tengo cargado en smarty
async function createComent(){
    let comentario= {
        "comentario":document.querySelector("#coment"),
        "puntaje":document.querySelector("#puntaje").value,
        "fecha":date("Y-m-d"),
        "id_reacondicionado":idComent,
        "id_usuario": idUsuario
    }
    try{
        let res = await fetch(urlApi, {
            "method": "POST",
            "headers":{"Content-type": "application/json"},
            "body": JSON.stringify(comentario)
        })
        if(res.status===201){
           console.log("creado!")
        }
    } 

    catch(error){
        console.log(error)
    }
}
}