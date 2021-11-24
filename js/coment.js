

"use strict";


const id_reacondicionado = document.querySelector("#form-crear-comentario").dataset.id_reacondicionado;
const id_usuario = document.querySelector("#form-crear-comentario").dataset.id_usuario;
const urlApi = "api/comentarios";


let app = new Vue({
    el: "#comentspace",
    data: {
        subtitulo: "Aqui Van Los Comentarios del celular " +id_reacondicionado,
        comentarios:[],
    },//En este arreglo se guarda el objeto que me trae el fetch
});

async function getComents() {
    try {
        let response = await fetch(urlApi + "/reacondicionado/" + id_reacondicionado);
        let comentarios = await response.json();
        app.comentarios = comentarios;
    }
    catch (e) {
        console.log(e);
    }
}

getComents();

let btn = document.querySelector("#btn-coment").addEventListener("click", createComent);


async function createComent() {
    let comentario = document.querySelector("#comentario").value;
    let puntaje = document.querySelector("#puntaje").value;

    let nuevoComentario = {
        id_reacondicionado: id_reacondicionado,
        id_usuario: id_usuario,
        comentario: comentario,
        puntaje: puntaje
        
    }
    try {
        let res = await fetch(urlApi, {
            method: "POST",
            headers: {"Content-type": "application/json"
            },
            body: JSON.stringify(nuevoComentario)
        });  
        if (res.status == 200) {
            getComents();
        }
} catch (error) {
    console.log("error");
}
}


