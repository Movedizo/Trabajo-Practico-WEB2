{include file='templates/header.tpl'}

<div>
    <h2>Ingreso</h2>
    <form class="form-alta" action="verificacion" method="post">
        <input placeholder="usuario" type="text" name="usuario" id="usuario" required>
        <input placeholder="password" type="password" name="password" id="password" required>
        <input type="submit" class="btn btn-primary" value="Ingresar">
    </form>
    
</div>

<div>
    <ul>
        <li><a href="visitante">Ingresar sin loguearse </a></li>
        <li> <a href="registro">Crear usuario</a></li>
    </ul>
</div>

<h2 class="">{$error}<h2>

{include file='templates/footer.tpl'}