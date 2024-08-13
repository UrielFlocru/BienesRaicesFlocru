<?php
    require '../../includes/app.php';
    use App\Vendedor;

    autenticado();

    // Validar que sea int el id
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if (!$id){
        header('Location: ../index.php');
    }

    //Buscar al vendedor
    $vendedor = Vendedor::find($id);

    //Arreglo de errores
    $errores = Vendedor::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Asignar los atributos
        $args = $_POST['vendedor'];

        $vendedor->sincronizar($args);

        //Validar errores
        $errores = $vendedor->validar();

        if (empty($errores)){
            $vendedor->update();
        }

    }

    incluirTemplate('header');

?>
    
    <main class="contenedor seccion">
        <h1>Actualizar vendedor(a)</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
            
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
           
        <?php endforeach; ?>

        <form class="formulario" method="POST">
            <?php include "../../includes/templates/formulario_vendedores.php";  ?>
            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>

    </main>




<?php incluirTemplate('footer');?>



