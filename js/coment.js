"user strict"
document.addEventListener('DOMContentLoaded', LoadGetComent);

function LoadGetComent() {


    let id_reacondicionado = document.querySelector("#form-crear-comentario").dataset.id_reacondicionado;
    const urlApi = "api/comentarios/";
    //Falta preguntar si la cantidad de items es igual a 1 para incluir el template de comentarios.

    let app = new Vue({
        el: "#comentspace",
        data: {
            titulo: "Caja de comentarios",
            subtitulo: "Aqui Van Los Comentarios",
            comentarios: []
        },//En este arreglo se guarda el objeto que me trae el fetch
    });
    
    async function getComents() {
        try {
            let response = await fetch(urlApi + "/" + id_reacondicionado);
            let comentarios = await response.json();
            app.comentarios.push(comentarios);
        }
        catch (e) {
            console.log(e);
        }
    }
    getComents();
}


document.addEventListener('DOMContentLoaded', CrearComentarios);

function CrearComentarios() {
    let id_usuario = document.querySelector("#form-crear-comentario").dataset.id_usuario;
    
    let btn = document.querySelector("#btn-coment").addEventListener("click", createComent);
    
    async function createComent() {

        let comentario = document.querySelector("#comentario").value;
        let puntaje = document.querySelector("#puntaje").value;

        let comentarioJson = {
            comentario: comentario,
            puntaje: puntaje,
            fecha: "2021/01/02",
            id_reacondicionado: id_reacondicionado,
            id_usuario: id_usuario
        }

        try {
            let respuesta = await fetch(urlApi + "/" + id_reacondicionado, {
                method: "POST",
                headers: { "Content-type": "application/json" },
                body: JSON.stringify(comentarioJson),
            });
            if (respuesta.ok) {
                console.log("Comentario cargado");
            }
        }

        catch (error) {
            console.log(error);
        }
    }
}
