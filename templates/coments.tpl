{include file='templates/header.tpl'}

{literal}
    <div id="comentspace">
        <h2>{{titulo}}</h2>
        <h2>{{subtitulo}}</h2>

        <ul v-for="comentario in comentarios"  data-id= "comentario.id" class="list-group-item">
            <li>{{comentario.comentario}} </li>
        </ul>
    </div>        
{/literal}

{include file='templates/footer.tpl'}
