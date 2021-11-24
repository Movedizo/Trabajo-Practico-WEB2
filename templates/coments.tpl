{include file='templates/header.tpl'}

{literal}

    <div id="comentspace">

        <h2>{{subtitulo}}</h2>
        <ul v-for="comentario in comentarios"> 

        <li class="list-group-item">{{comentario.comentario}} <span> 
        <button class="btn btn-danger" v-on:click.prevent="deleteComentario(comentario.id_comentario)" id="btn-borrar" :data-id_comentario= "comentario.id_comentario" >Borrar</button>
       
           
            </ul>

    </div>        

{/literal}

{include file='templates/footer.tpl'}
