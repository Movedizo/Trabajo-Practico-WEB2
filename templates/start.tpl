{include file='templates/header.tpl'}

<h1> Bienvenidos a Reacondicionados Tandil</h1>

<nav>
    <ul>
        <li><a href="marca/">Marca</a></li>
        <li><a href="almacenamiento/">Almacenamiento</a></li>
        <li><a href="ram/">Velocidad de procesamiento</a></li>
        <li><a href="verReacondicionados/">Ver Lista de Equipos</a></li>
        {if $rol >= 1}
            <li><a href="agregar/">Agregar</a></li>
        {/if}
    </ul>
</nav>




<div>
    {if $rol>=1}
        <a href="logout">Logout</a>
    {/if}

    {if $rol == 2}
        <a href="usuarios"> Usuarios</a>
    {/if}

    <a href="home"> Volver</a>

</div>

<div>
    <h3> Filtro</h3>

    <form class="input-group w-25" action="filtrado" method="POST">
        <input class="form-control" name="modelo" placeholder="modelo">
        <input type="submit"  value="Buscar">
        </form>

    <a href="home"> Volver</a>
</div>

{include file='templates/footer.tpl'}