{{include file='templates/header.tpl'}}

<div>
    <h1 class="h1">{$titulo}</h1>
    <table class="table">
        <tr>
            <td>Modelo</td>
        </tr>
        
        {foreach from=$reacondicionados item=$reacondicionado}
            <tr>
                <td><a href="caracteristicas/{$reacondicionado->id_reacondicionado}">{$reacondicionado->modelo}</a></td>
                </tr>
        {/foreach}}
    </table> 
</div>

<a href="homestart"> Volver</a>

{include file='templates/footer.tpl'}