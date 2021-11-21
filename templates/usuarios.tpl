{include file='templates/header.tpl'}
<h1> Lista de Usuarios</h1>

    <table>
    <tr>
    <td>Usuario</td>
    <td>Rol</td>
    </tr>
    <tr>
    {foreach from=$usuarios item=$usuario}
    <td>{$usuario->usuario}</td>
    <td>{$usuario->rol}</td>
    {if $rol = 2 && $usuario->rol <2}    
        <td> <a href="editarRol/{$usuario->id}">Editar Rol</a></button></td>
        <td> <a href="deleteUsuario/{$usuario->id}">Eliminar Usuario</a></button></td>                  
    {/if}
    </tr>
        
    {/foreach}
    
    </table>}
{include file='templates/footer.tpl'}
