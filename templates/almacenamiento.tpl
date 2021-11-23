{include file='templates/header.tpl'}

<div>

    <ul>
        {foreach from=$almacenamiento item=$gb}
            <li> <a href="almacenamientoporgb/{$gb->almacenamiento}">{$gb->almacenamiento}</a></li>
        {/foreach}}        
    </ul>
    
</div>

<a href="listaAdmin">Menu</a>
<a href="home">Inicio</a>

{include file='templates/footer.tpl'}









