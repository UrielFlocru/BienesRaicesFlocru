<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Gd\Driver;
    
    //Autenticacion
    autenticado();

    //Database
    $db = conectarDb();
    
    //Agregar vendedores desde la base de datos
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo de errores
    $errores = Propiedad::getErrores();

    //Arreglo con mensajes de error
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $rooms= '';
    $wc = '';
    $car =  '';
    $vendedor = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST);
        
        //***Subida de archivos***
        //Genera nombre único
        $nombreImg = md5(uniqid(rand(), true)) . ".jpg";
        
        if ($_FILES['imagen']['tmp_name']){

            // create new image instance (800 x 600)
            $manager = new ImageManager(new Driver());
            $image = $manager->read($_FILES['imagen']['tmp_name']);
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

            $resultado = $propiedad->create();

            if ($resultado){
                // Redireccionar al usuario
                header ('Location: ../index.php?resultado=1' );
            }

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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción</label>
                <textarea  id="descripcion" name="descripcion"> <?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>
                <label for="rooms">Habitaciones</label>
                <input type="number" id="rooms" name="rooms" placeholder="Ej: 3" min="1" max="9" value="<?php echo $rooms; ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="car">Estacionamiento</label>
                <input type="number" id="car" name="car" placeholder="Ej: 3" min="1" max="9" value="<?php echo $car; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                        <option <?php echo $vendedor === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['nombre']. " " . $row['apellido']; ?></option>

                    <?php endwhile;  ?>    
                </select>

            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">


        </form>
    </main>




<?php incluirTemplate('footer');?>