<?php


    //Base de datos
    require 'includes/app.php';
    $db = conectarDb();

    
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email =mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }

        if (!$password){
            $errores[] = "El password es obligatorio";
        }

        if (empty($errores)){
            //Revisar si el usuario existe
            $query = "SELECT * FROM users WHERE email = '{$email}';";
            $resultado = mysqli_query($db, $query);

            if ($resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                $auth = password_verify($password, $usuario['password']);

                if ($auth){
                    //El usuario esta autenticado

                    session_start();

                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: admin/index.php');

                }else{
                    $errores[]= "El password es incorrecto";
                }
            } else{
                $errores[] = "El usuario no existe";
            }
        }
    }







    incluirTemplate('header',$inicio=false);
?>

    <main class="contenedor seccion contenido-centrado">
        <title>Iniciar Sesión</title>
        <?php foreach($errores as $error): ?> 
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>

        <form method="post" class="formulario">
            <fieldset>
                <legend>Correo y Contraseña</legend>

                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" placeholder="alguien@example.com" id="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password">

            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton-verde">
        </form>

    </main>


<?php incluirTemplate('footer');?>