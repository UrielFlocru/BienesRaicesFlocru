<?php
    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDb();

    //Creación del Query
    $query = "SELECT * FROM propiedades";

    //Consulta la base de datos
    $resultadoQuery = mysqli_query($db, $query);

    //Importar funciones
    require '../includes/funciones.php';

    //Resultado despues de agregar anuncio
    $resultado= $_GET['resultado'] ?? null;

    //
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id){
            //Eliminar archivo (img)
            $query = "SELECT imagen FROM propiedades WHERE id = {$id}";
            $resultadoQuery = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultadoQuery);

            unlink('../imagenes/' . $propiedad['imagen']);




            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = {$id} ";

            $resultadoQuery = mysqli_query ($db, $query);

            if ($resultadoQuery){
                header("location: index.php?resultado=3");

            }
        }
    }



    // Incluir plantilla
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if ($resultado==1): ?>
            <p class="alerta exito">Propiedad Agregada Correctamente</p>
            <?php elseif ($resultado==2): ?>
                <p class="alerta exito">Propiedad Actualizada Correctamente</p>
                <?php elseif ($resultado==3): ?>
                    <p class="alerta exito">Propiedad Eliminada Correctamente</p>
        <?php endif; ?>



        <a href="propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($propiedad = mysqli_fetch_assoc($resultadoQuery)):?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad['imagen'];?>" alt=""></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="ELIMINAR">

                        </form>
                        
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>


        </table>

    </main>


<?php
    //Cerrar conexión
    mysqli_close($db);

    //Incluir plantilla footer
    incluirTemplate('footer');
?>