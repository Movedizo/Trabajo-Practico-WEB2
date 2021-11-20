
"user strict"    

let id_reacondicionado = document.querySelector("#form-crear-comentario").dataset.id_reacondicionado;
let id_usuario = document.querySelector("#form-crear-comentario").dataset.id_usuario;
const urlApi = "api/comentarios/" + id_reacondicionado;
//Falta preguntar si la cantidad de items es igual a 1 para incluir el template de comentarios.

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
        
        app.comentarios.push(comentarios);
        
    } catch (e) {
        console.log(e);
    }
    
}
getComents();

document.addEventListener('DOMContentLoaded', CrearComentarios);
function CrearComentarios(){
let btn = document.querySelector("#btn-coment").addEventListener("click", createComent);


async function createComent(){

    let comentario = document.querySelector("#comentario").value;
    let puntaje = document.querySelector("#puntaje").value;
    
    let comentJson= {
        comentario :comentario,
        puntaje: puntaje,
        fecha:"2021/01/02",
        id_reacondicionado:id_reacondicionado,
        id_usuario: id_usuario
    }   
    try{
        let res = await fetch(urlApi, {
            "method": "POST",
            "headers":{"Content-type": "application/json"},
            "body": JSON.stringify(comentJson)
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
