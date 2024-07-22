<?php
    //Autenticacion
    require '../../includes/funciones.php';
    $auth = autenticado();

    if (!$auth){
        header('Location: /bienesraices_Flocru/index.php');
    }

    //Database
    require '../../includes/config/database.php';
    $db = conectarDb();
    
    //Agregar vendedores desde la base de datos

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);



    //Arreglo con mensajes de error
    $errores = [];
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $rooms= '';
    $wc = '';
    $car =  '';
    $vendedor = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //echo "<pre>";
        //echo var_dump($_POST);
        //echo "<pre>";

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $rooms= mysqli_real_escape_string($db, $_POST['rooms']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $car = mysqli_real_escape_string($db, $_POST['car']);
        $vendedor = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files a una imagen
        $imagen = $_FILES['imagen'];


        if (!$titulo){  
            $errores[]= "Debes agregar un título";
        }
        if (!$precio){  
            $errores[]= "Debes agregar un precio";
        }
        if (strlen($descripcion)<50){  
            $errores[]= "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$rooms){
            $errores[]= "Debes agrear el número de habitaciones";
        }
        if (!$wc){
            $errores[]= "Debes agrear el número de baños";
        }
        if (!$car){
            $errores[]= "Debes agrear el número de espacios para estacionar";
        }
        if (!$vendedor){
            $errores[]= "Debes seleccionar un vendedor";
        }

        if (!$imagen['name'] || $imagen['error'] ){
            $errores[]= "La imagen es obligatoria";
        }

        // Validar imagen por tamaño (1Mb max)
        $medida = 1000*1000;

        if ($imagen['size']>$medida ){
            $errores[]= "La imagen es muy pesada (max 100Kb)";

        }





        //echo "<pre>";
        //echo var_dump($errores);
        //echo "<pre>";

        //Revisar que el arreglo de errores esta vacio
        if (empty($errores)){

            //***Subida de archivos***

            //Crear carpeta
            $carpetaImg = '../../imagenes/';

            if (!is_dir($carpetaImg)){

                mkdir($carpetaImg,0777);

            }

            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImg . $nombreImg);

            



            //Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, baños, estacionamiento, fecha,
            vendedores_id) VALUES ('$titulo', '$precio', '$nombreImg', '$descripcion', '$rooms', '$wc', '$car', '$creado' , '$vendedor'); ";

            //echo $query;
            $resultado = mysqli_query($db,$query);

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