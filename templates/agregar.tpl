{include file='templates/header.tpl'}

<div class= "lis-group">
    <div>
        <h2>Añadir Marcas de Celulares</h2>
        <form action="createMarca" method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="Marca" name="marca" id="marca">
            <input type="file" name="imagen" id="imagen">
            <input type="text" placeholder="Sistema Operativo" name="sistemaoperativo" id="sistemaoperativo">
            <input type="submit" Enviar>
            
        </form>

        <h2>Añadir Celulares Reacondicionados</h2>
        <form action="createReacondicionado" method="POST">

            <input type="text" placeholder="Marca" name="marca" id="marca">
            <input type="text" placeholder="Modelo" name="modelo" id="modelo">
            <input type="number" placeholder="Precio" name="precio" id="precio">
            <input type="text" placeholder="Codigo" name="codigo" id="codigo">
            <input type="text"  placeholder="Almacenamiento" name="almacenamiento" id="almacenamiento">
            <input type="text" placeholder="Tamaño de Pantalla" name="pantalla" id="pantalla">
            <input type="text" placeholder="Ram" name="ram" id="ram">
            <input type="text" placeholder="Bateria" name="bateria" id="bateria">
            <input type="number" placeholder="stock" name="stock" id="stock">
            <input type="submit" Enviar>
            
        </form>
    </div>
</div>

<a href="homestart"> Volver</a>

{include file='templates/footer.tpl'}