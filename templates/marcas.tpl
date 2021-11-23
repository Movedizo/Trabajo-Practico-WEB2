{include file='templates/header.tpl'}

<h1>Todas Las Marcas Disponibles</h1>

<div class="container">
    <ul class="li">
        {foreach from=$marcas item=$item}
            <li><a href="verfull/?marca={$item->id_marca}">{$item->marca}</a></li>
            {if isset($marca->imagen)}
                <img src="{$marca->imagen}"/>
            {/if}

            <li>Sistema Operativo {$item->sistemaoperativo}</li>
        {/foreach}
    </ul>
</div>

<a href="homestart"> Volver</a>

{include file='templates/footer.tpl'}
