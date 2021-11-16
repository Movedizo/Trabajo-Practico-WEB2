<div class= "lis-group">
    <div>
        <h2>Editar  Roles de Usuarios</h2>
        <form action="updateUsuario" method="POST">
            <input type="hidden" name="id" value="{$usuarios}">
            <input type="text" placeholder="Usuario" name="Usuario" id="usuario">
            <input type="text" placeholder="Rol" name="rol" id="rol">
            <input type="submit" value="Enviar">
        </form>