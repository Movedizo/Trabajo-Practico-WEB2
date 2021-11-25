{include file='templates/header.tpl'}

<div>

    <h2>Editar Marcas de Celulares</h2>
        
    <form action="updateMarca" method="POST">
        <input type="hidden" name="id_marca" value="{$marca}">
        <input type="text" placeholder="Marca" name="marca" id="marca">
        <input type="text" placeholder="Sistema Operativo" name="sistemaoperativo" id="sistemaoperativo">
        <input type="submit" value="Enviar">
    </form>
</div>

{include file='templates/footer.tpl'}