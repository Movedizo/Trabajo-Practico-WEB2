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
            <td ><a href="listaAdmin">Inicio</a></td>
            <td><a href="logout">Salir</a></td>
        </tr>

        {foreach from=$reacondicionados item=$reacondicionado}
        <tr>
            <td>{$reacondicionado->marca}</td>
            <td>{$reacondicionado->modelo}</td>
            <td>{$reacondicionado->precio}</td>
            <td>{$reacondicionado->codigo}</td>
            <td>{$reacondicionado->almacenamiento}</td>
            <td>{$reacondicionado->pantalla}</td>
            <td>{$reacondicionado->ram}</td>
            <td>{$reacondicionado->bateria}</td>
            <td>{$reacondicionado->stock}</td>
            <td> <a href="editar/{$reacondicionado->id_reacondicionado}">Editar</a></button></td>
            <td> <a href="eliminar/{$reacondicionado->id_reacondicionado}">Eliminar</a></button></td>                  
        </tr>
        {/foreach}  
      
    </table> 
</div>

{include file='templates/footer.tpl'}
