
{include file='templates/header.tpl'}

<div class= "lis-group">
    <div>
        <h2>Editar Marcas de Celulares</h2>
        <form action="updateMarca" method="POST" enctype="multipart/form-data"> 

            <input type="hidden" name="id_reacondicionado" value="{$marcas}">
            <input type="file" name="marca" id="imagen">
            <input type="text" placeholder="Marca" name="marca" id="marca">
            <input type="text" placeholder="Sistema Operativo" name="sistemaoperativo" id="sistemaoperativo">
            <input type="submit" value="Enviar"> 
             
        </form>

        <h2>Editar Celulares Reacondicionados</h2>
        <form action="updateReacondicionado" method="POST" enctype="multipart/form-data">    
            
            <input type="hidden" name="id_reacondicionado" value="{$reacondicionados}">
            <input type="file" name="modelo" id="imagen">
            <input type="text" placeholder="Marca" name="marca" id="marca">
            <input type="text" placeholder="Modelo" name="modelo" id="modelo">
            <input type="number" placeholder="Precio" name="precio" id="precio">
            <input type="text" placeholder="Codigo" name="codigo" id="codigo">
            <input type="text"  placeholder="Almacenamiento" name="almacenamiento" id="almacenamiento">
            <input type="text" placeholder="Tamaño de Pantalla" name="pantalla" id="pantalla">
            <input type="text" placeholder="Ram" name="ram" id="ram">
            <input type="text" placeholder="Bateria" name="bateria" id="bateria">
            <input type="number" placeholder="stock" name="stock" id="stock">
            <input type="submit" value="Enviar">
            
        </form>
    </div>
</div>

{include file='templates/footer.tpl'}
