{include file='templates/header.tpl'}

<div class= "lis-group">
    <div>
        <h2>Editar  Roles de Usuarios del usuario {$usuario->id}</h2>
        <form action="updateUsuario/{$usuario->id}" method="POST">
            <input type="hidden" name="idUsuario" value="{$usuario->id}" id="idUsuario">
            <input type="text" placeholder="Rol" name="rol" id="rol">
            <input type="submit" value="Enviar">
        </form>

    </div>
</div>
{include file='templates/footer.tpl'}
