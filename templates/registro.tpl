{include file='templates/header.tpl'}

<h2>Registro</h2>

<form method="POST" action="createUsser">
    <input type="text" name="usuario" placeholder="Ingrese su usuario..."/>
    <input type="password" name="password" placeholder="Ingrese su password..."/>
    <button>Crear cuenta</button>
</form>';

{include file='templates/footer.tpl'}
