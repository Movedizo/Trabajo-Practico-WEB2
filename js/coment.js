"user strict"
alert ("que hace");
let idComent = document.querySelector("#comentarioID").value;
let urlApi = "api/comentarios/" + idComent;

let app = new Vue({
    el: "#comentspace",
    data: {
        titulo: "Caja de comentarios",
        comentarios: [], // this->smarty->assign("tareas",  $tareas)
    },
}); 

async function getComents() {
    // fetch para traer todas las tareas
    try {
        let response = await fetch(urlApi);
        let comentarios = await response.json();

        app.comentarios = comentarios;
    } catch (e) {
        console.log(e);
    }
}
getComents();