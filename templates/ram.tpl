{include file='templates/header.tpl'}

<div>
    <ul>
        {foreach from=$ram item=$memoriaram}
            <li> <a href="memoriaram/{$memoriaram->ram}">{$memoriaram->ram}</a></li>
        {/foreach}
    </ul>
</div>

<a href="listaAdmin">Menu</a>
<a href="home">Inicio</a>

{include file='templates/footer.tpl'}











