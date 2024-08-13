<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;
    
    //Autenticacion
    autenticado();

    //Instanciar nueva propiedad
    $propiedad = new Propiedad();

    //Consulta para obtener los vendedores
    $vendedores = Vendedor::all();


    //Arreglo de errores
    $errores = Propiedad::getErrores();
 
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);
        
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

        //Valida la existencia de todos los datos
        $errores = $propiedad->validar();

        //Revisar que el arreglo de errores esta vacio
        if (empty($errores)){
            //Crear carpeta
            if (!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES,0777);
            }

            //Guarda la imagen en el servidor
            $encoded->save(CARPETA_IMAGENES . $nombreImg); // save modified image in new format 
            $propiedad->create();
        }

        
    }

    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
           
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/bienesraices_Flocru/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include "../../includes/templates/formulario_propiedades.php";  ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>




<?php incluirTemplate('footer');?>