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
            {if $logueado == 1}    
                <td> <a href="editar/{$reacondicionado->id_reacondicionado}">Editar</a></button></td>
                <td> <a href="eliminar/{$reacondicionado->id_reacondicionado}">Eliminar</a></button></td>                  
            {/if}
        </tr>
        
    {/foreach}  
    
    </table> 
</div>

{include file="templates/coments.tpl"}

<p id="idComent" value="{$reacondicionado->id_reacondicionado}"></p>

<h2>Agrega un Comentario</h2>
            <form class="form-alta" action="createComent/{$reacondicionado->id_reacondicionado}" method="POST">
                <textarea placeholder="Comentario" type="text" name="coment" id="coment"> </textarea>
                <select id="puntaje">
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>

     
{include file='templates/footer.tpl'}
