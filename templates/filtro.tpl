{include file='templates/header.tpl'}
<div>
    <table class="table">
        <tr>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Precio</td>
            <td>Codigo</td>
            <td>Almacenamiento</td>
            <td>Tamaño de pantalla</td>
            <td>Velocidad</td>
            <td>Capacidad de bateria</td>
            <td>Stock</td>
            <td><a href="homestart">Inicio</a></td>
            <td><a href="logout">Salir</a></td>
        </tr>

        {foreach from=$modelo item=$reacondicionado}
            <tr>
                <td>{$reacondicionado->marca}</td>
                <td><a href="caracteristicas/{$reacondicionado->id_reacondicionado}">{$reacondicionado->modelo}</a></td>
                <td>{$reacondicionado->precio}</td>
                <td>{$reacondicionado->codigo}</td>
                <td>{$reacondicionado->almacenamiento}</td>
                <td>{$reacondicionado->pantalla}</td>
                <td>{$reacondicionado->ram}</td>
                <td>{$reacondicionado->bateria}</td>
                <td>{$reacondicionado->stock}</td>
                
            </tr>

        {/foreach}

    </table>
</div>



{include file='templates/footer.tpl'}