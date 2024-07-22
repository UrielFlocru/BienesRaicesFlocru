<?php
    if (!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices_Flocru/build/css/app.css">

</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices_Flocru/index.php">
                    <img src="/bienesraices_Flocru/build/img/logo.svg" alt="Logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices_Flocru/build/img/barras.svg" alt="Icono responsive">
                </div>

                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if ($auth) :?>
                        <a href="admin/index.php">Admin</a>
                        <a href="/bienesraices_Flocru/cerrar-sesion.php">Cerrar Sesion</a>
                    <?php endif;?>
                </nav>
            </div> <!-- barra -->



            <?php if ($inicio){ ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>

        </div>

    </header>