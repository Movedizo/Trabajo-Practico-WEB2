<<<<<<< HEAD
=======
Prueba commit
function stockReacondicionado(){
        $this->accesoHelper->checkLoggedIn();

        if(!isset($_POST['stock'])){
            $stock = 0;
        }else{
            $stock = 1;
        }

        $this->model->insertReacondicionado($_POST['id'], $_POST['id_marca'], $_POST['modelo'], $_POST['precio'], $_POST['codigo'], $_POST['almacenamiento'], $_POST['pantalla'], $_POST['ram'], $_POST['bateria'], $stock);
        $this->view->showHomeLocation();
    }

       
 case 'stockReacondicionado': 
            $reacondicionadosController->stockReacondicionado(); 
            break;


Home 
    usuario
        lista de categorias (nav)

            Busqueda por:

            marca/modelo
            almacenamiento (4, 8, 16, 31, 64, 128)
            procesamiento (1, 2, 3, 4)

    administrador

        lista de categorias (nav)

            ingreso con usuario y contrasena

        Busqueda por:

            marca/modelo
            almacenamiento (4, 8, 16, 31, 64, 128)
            procesamiento (1, 2, 3, 4)
            cada item borrar/stock
            agregar reacondicionado por formulario.

            hola 
        
>>>>>>> 86f7816f439e4ffeec407983fdaf03f9bfec3e85
