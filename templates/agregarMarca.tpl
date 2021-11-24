{include file='templates/header.tpl'}

<div class= "lis-group">
    <div>
        <h2>Añadir Marcas de Celulares</h2>

        <form action="createMarca" method="POST">
            <input type="text" placeholder="Marca" name="marca" id="marca">
            <input type="text" placeholder="Sistema Operativo" name="sistemaoperativo" id="sistemaoperativo">
            <input type="submit" Enviar>  
        </form>
    </div>
</div>

<a href="homestart"> Volver</a>

{include file='templates/footer.tpl'}