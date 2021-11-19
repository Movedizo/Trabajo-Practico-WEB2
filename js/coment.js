  "user strict"


  
//Aca intento traer el id_reacondicionado que tenemos en smarty
let idComent = document.querySelector("form-crear-comentario").dataset.id;
//console.log(idComent); 

let urlApi = "api/comentarios/" + idComent;


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
