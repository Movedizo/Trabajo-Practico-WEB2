{{include file='templates/header.tpl'}}
<script src="js/coment.js"></script>

<div>
    <h1 class="h1">{$titulo}</h1>
    <table class="table">
    
        <tr>
            <td>Modelo</td>
        </tr>
        
        {foreach from=$reacondicionados item=$reacondicionado}
            <tr>
                <td><a href="caracteristicas/{$reacondicionado->id_reacondicionado}">{$reacondicionado->modelo}</a></td>
                <td id="coment">Aqui van los comentarios</td>
                </tr>
        {/foreach}}

    </table> 
</div>

<a href="listaAdmin"> Volver</a>

{include file='templates/footer.tpl'}