
{literal}

    <div id="comentspace">
    <h2>{{titulo}}</h2>
    <h2>{{subtitulo}}</h2>
        <ul v-for="comentario in comentarios" class="list-group-item">
         <li>{{comentario.comentario}} |   {{comentario.fecha}} | {{comentario.puntaje}} </li>
         </ul>

 </div>        

{/literal}