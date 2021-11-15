{literal}
<div id="comentspace"></div>
<h2>{{ titulo }}</h2>
    <ul id="lista-tareas" class="list-group">
        <li v-for="coment in comentarios" class="list-group-item">
         {{coment.comentario}} | {{coment.puntaje}} | {{coment.fecha}}

 </div>        

{/literal}