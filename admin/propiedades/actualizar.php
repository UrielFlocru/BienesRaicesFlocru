<?php

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';

    //Autenticacion
    autenticado();

    // Validar que sea int el id
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if (!$id){
        header('Location: ../index.php');
    }

    //Buscar la propiedad
    $propiedad = Propiedad::find($id);

    //Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //Errores
    $errores = Propiedad::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Asignar los atributos
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);


        //Validar errores
        $errores = $propiedad->validar();

        //***Subida de archivos***
        //Genera nombre único
        $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

        
        if ($_FILES['propiedad']['tmp_name']['imagen']){

            // create new image instance (800 x 600)
            $manager = new ImageManager(new Driver());
            $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen']);
            $image->cover(800, 600);
            $encoded = $image->toJpeg();

            //Guarda el nombre de la imagen
            $propiedad->setImage($nombreImg);
        }




        //Revisar que el arreglo de errores esta vacio
        if (empty($errores)){
            //Crear carpeta
            if (!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES,0777);
            }
            if ($_FILES['propiedad']['tmp_name']['imagen']){
                //Guarda la imagen en el servidor
                $encoded->save(CARPETA_IMAGENES . $nombreImg); // save modified image in new format
            }
            
            //Actualiza la base de datos
            $propiedad->update();
        }

        
    }
    

    incluirTemplate('header');

    


?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
           
        <?php endforeach; ?>

        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <?php include "../../includes/templates/formulario_propiedades.php";?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">


        </form>
    </main>




<?php incluirTemplate('footer');?>