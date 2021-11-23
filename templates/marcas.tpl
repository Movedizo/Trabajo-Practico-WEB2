{include file='templates/header.tpl'}

<h1>Todas Las Marcas Disponibles</h1>

<div class="container">
    <ul class="li">
        {foreach from=$marcas item=$item}
            <li><a href="modelo/{$item->id_marca}">{$item->marca}</a></li>
            {if isset($item->imagen)}
                <img src="{$item->imagen}"/>
            {/if}
            <li>Sistema Operativo {$item->sistemaoperativo}</li>
            {if $rol ==1 || $rol == 2}    
                <li> <a href="editar/{$item->id_marca}">Editar</a></button></li>
                <li> <a href="eliminar/{$item->id_marca}">Eliminar</a></button></li>                  
            {/if}
        {/foreach}
    </ul>
</div>

<a href="listaAdmin"> Volver</a>

{include file='templates/footer.tpl'}
