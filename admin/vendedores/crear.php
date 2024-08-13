<?php
    require '../../includes/app.php';
    use App\Vendedor;

    autenticado();

    $vendedor = new Vendedor();

    //Arreglo de errores
    $errores = Vendedor::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        // Crear una nueva estancia
        $vendedor = new Vendedor($_POST['vendedor']);

        //Validar que no haya campos vacios
        $errores = $vendedor->validar();

        //Si no hay errores entonces:
        if (empty($errores)){
            $vendedor->create();

        }


    }

    incluirTemplate('header');

?>
    
    <main class="contenedor seccion">
        <h1>Registrar vendedor(a)</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
           
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/bienesraices_Flocru/admin/vendedores/crear.php">
            <?php include "../../includes/templates/formulario_vendedores.php";  ?>
            <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>

    </main>




<?php incluirTemplate('footer');?>



