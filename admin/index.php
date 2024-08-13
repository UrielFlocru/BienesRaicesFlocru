<?php
    
    require '../includes/app.php';

    //Importar clases
    use App\Propiedad;
    use App\Vendedor;

    //Autenticacion
    autenticado();
    
    //Consultar todas las propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    //Resultado despues de agregar anuncio
    $resultado= $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Validar Id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);


        if ($id){
            $tipo= $_POST['tipo'];
            if (validarTipoContenido($tipo)){
                if ($tipo == 'vendedor'){
                    $vendedor = Vendedor::find($id);
                    $vendedor->delete();

                } else if ($tipo == 'propiedad'){
                    //Encontrar la propiedad con el id específicado
                    $propiedad = Propiedad::find($id);
                    //Eliminar objeto 
                    $propiedad->delete();

                }
            }

        }
    }

    // Incluir plantilla
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php $mensaje = mostrarNotificacion($resultado);
            if ($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php } ?>



        <a href="propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="vendedores/crear.php" class="boton boton-amarillo">Agregar Vendedor</a>
        <h2>Propiedades</h2>
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
                <?php foreach ($propiedades as $propiedad) :?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen;?>" alt=""></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="ELIMINAR">

                        </form>
                        
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>


        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($vendedores as $vendedor) :?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " ". $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="post" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="ELIMINAR">

                        </form>
                        
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>


        </table>

    </main>


<?php
    //Cerrar conexión
    mysqli_close($db);

    //Incluir plantilla footer
    incluirTemplate('footer');
?>