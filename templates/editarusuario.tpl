{include file='templates/header.tpl'}

<div class= "lis-group">
    <div>
        <h2>Editar  Roles de Usuarios del usuario {$usuario->usuario}</h2>
        <form action="updateUsuario" method="POST">
            <input type="hidden" name="id" value="{$usuario->id}">
            <input type="text" placeholder="Rol" name="rol" id="rol">
            <input type="submit" value="Enviar">
        </form>

    </div>
</div>

{include file='templates/footer.tpl'}
