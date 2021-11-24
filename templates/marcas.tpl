{include file='templates/header.tpl'}

<h1>Todas Las Marcas Disponibles</h1>

<div class="container">
    <ul class="li">
        {foreach from=$marcas item=$item}
            <li><a href="verfull/?marca={$item->id_marca}">{$item->marca}</a></li>
            {if $rol ==1 || $rol == 2}    
                <td> <a href="editarMarca/{$item->id_marca}">Editar</a></button></td>
                <td> <a href="eliminarMarca/{$item->id_marca}">Eliminar</a></button></td>  
            <li>Sistema Operativo {$item->sistemaoperativo}</li>
            {/if}
        {/foreach}
    </ul>
</div>

<a href="homestart"> Volver</a>

{include file='templates/footer.tpl'}
