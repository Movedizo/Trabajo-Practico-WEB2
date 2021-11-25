Roles de usuario:
Como usuario quiero poder registrarme en el sitio generando nombre de usuario/mail y contraseña.✅
Al registrarse el usuario se loguea automáticamente. Este usuario no tiene privilegios de administración.


Como administrador del sitio, quiero poder asignar o quitar permisos de administración a cualquier usuario.
Como administrador del sitio, quiero poder eliminar usuarios.
Comentarios (todo por API REST):
Como usuario registrado, quiero poder postear comentarios en los ítems del sitio asignándoles un puntaje de 1 a 5. 
Cada ítem del sitio tendrá la posibilidad de recibir comentarios y puntuaciones solamente de usuarios logueados.
Como administrador del sitio, quiero poder borrar comentarios.


USER STORIES OPTATIVAS
Las User Stories optativas suman un punto cada uno. Se debe completar al menos una para acceder a la promoción ya que el resto del trabajo sin opcionales suma 6 puntos.

Como administrador del sitio, quiero poder asociar una imagen a un ítem.
Las imágenes de los “ítems” se deben poder subir y eliminar desde el ABM de los mismos.

Como usuario quiero poder navegar los listados de ítems en forma paginada.
Se debe generar una paginación del lado del servidor para recorrer los listados en forma paginada. (Se recomienda empezar con “anterior” y “siguiente”)

Como usuario quiero poder realizar búsquedas avanzadas de los ítems.
Se debe incluir un formulario de búsquedas avanzadas donde se filtren los ítems dependiendo de los atributos internos. Esta búsqueda se debe resolver del lado del servidor.
Como usuario quiero poder ordenar los comentarios por antigüedad o puntaje, ascendente o descendente. (Via API REST)
	Se debe ordenar del lado del servidor.
Como usuario quiero poder filtrar los comentarios por cantidad de puntos.  (Via API REST)
	Se debe filtrar del lado del servidor.
