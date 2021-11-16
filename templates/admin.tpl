{include file='templates/header.tpl'}

<h1> Panel Administrador</h1>

<nav>
    <ul>
        <li><a href="marca/">Marca</a></li>
        <li><a href="almacenamiento/">Almacenamiento</a></li>
        <li><a href="ram/">Velocidad de procesamiento</a></li>
        <li><a href="verReacondicionados/">Editar</a></li>
        <li><a href="agregar/">Agregar</a></li>
    </ul>  
</nav>
{if $logueado == 1 }
{/if}
<a href="usuarios"> Usuarios</a>
<a href="home"> Volver</a>
<a href="logout">Logout</a>

{include file='templates/footer.tpl'}