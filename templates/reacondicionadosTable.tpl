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
        
        {foreach from=$reacondicionados item=$reacondicionado}
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
            {if $rol ==1 || $rol == 2}    
                <td> <a href="editar/{$reacondicionado->id_reacondicionado}">Editar</a></button></td>
                <td> <a href="eliminar/{$reacondicionado->id_reacondicionado}">Eliminar</a></button></td>                  
            {/if}
        </tr> 
        {/foreach}  
    </table>
</div>

<div>
    {if $cantReacondicionados > 1} 
    <nav aria-label="Paginacion">
        <ul class="pagination">
            <li class="page-item"> <a class="page-link" href="verReacondicionados/?pagina={$pagina-1}">Anterior</a></li>
        
            {for $i= 1; $i < $totalPaginas; $i++} 
            <li class="page-item"><a class="page-link" href="verReacondicionados/?pagina={$i}">{$i}</a></li>
            {/for}
        
            <li class="page-item"> <a class="page-link"
            href="verReacondicionados/?pagina={$pagina + 1}">Siguiente</a></li>
        </ul>   
    </nav>
    {/if}
    
    {if $cantReacondicionados <= 1} 
        {include file="templates/coments.tpl"}
        {if $rol >=1} 
        <h2>Agrega un Comentario</h2>
        <form id="form-crear-comentario" data-id_usuario= "{$usuario}" data-id_reacondicionado="            {$reacondicionado->id_reacondicionado}">
            <label class="form-label">Comentario</label>
            <input type="text"  id="comentario" name="comentario">
            <label class="form-label">Puntaje</label>
            <select name="puntaje" id="puntaje">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
            <input type="button" id="btn-coment" value="Comentar">
        </form>
        {/if}  
    {/if}  
</div>

<script src="js/coment.js"></script>

{include file='templates/footer.tpl'}
