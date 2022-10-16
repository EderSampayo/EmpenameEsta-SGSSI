<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa de Empeños</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">

    <!-- Primary Meta Tags -->
    <meta name="title" content="Empéñame Esta - Casa de Empeños">   <!-- Título que va a aparecer en Google -->
    <meta name="description" content="Encuentra todo tipo de artículos y empeña tus pertenencias en la mejor casa de empeños.">

</head>
<body>
    
    <header class="hero">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">Empéñame esta</h2>
            </div>

            <ul class="nav__link nav__link--menu">
                <li class="nav__items">
                    <a href="index.php" class="nav__links"></a>
                </li>
                <li class="nav__items">
                    <a href="productos.php" class="nav__links"></a>
                </li>
                <li class="nav__items">
                    <a href="iniciosesion.php" class="nav__links"></a>
                </li>

                <img src="images/cerrar.svg" class="nav__close" alt=""> 
            </ul>

            <div class="nav__menu">
                <img src="images/menu.svg" class="nav__close" alt="">
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Inicio de sesión</h1>
            <p class="hero__paragraph"></p>
        </section>
    </header>

    <main>
        <section class="knowledge">
            <form action="./iniciosesion.php" method="post">
                <div class="knowledge__container container">
                    <div class="knowledge__text">
                        <h2 class="subtitle">Inicio de sesión</h2>
                        <div class="footer__input">
                            <input type="username" name="Username" placeholder="Nombre de usuario:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="contra" name="Password" placeholder="Contraseña:" class="footer__input">
                        </div>
                        <h6>-</h6>
                        <div class="registrarse">
                            ¿No estás registrado? <a href="registro.php">Regístrate</a>
                        </div>
                        <h6>-</h6>
                        <input type="submit" name="InicSesion" value="Iniciar sesión">
                    </div>

                    <figure class="knowledge__picture">
                        <img src="./images/CasaEmpenos.jpg" class="knowledge__img">
                    </figure>
                </div>
            </form>
        </section>
        <?php
        $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
        if ($conexion->connect_error)
        {
            die("Database connection failed: " . $conn->connect_error);
        }
        
        if(isset($_POST['InicSesion'])) /*Si se ha pulsado el botón con nombre InicSesion */
        {
            if(strlen($_POST['Username']) >= 1 &&    /*Si longitud >= 1, es decir, si no está vacío*/
            strlen($_POST['Password']) >= 1)
            {
                $username = trim($_POST['Username']); /*Trim quita el espacio del principio y del final*/

                $consulta1 = "SELECT * FROM USUARIO WHERE Username='$username'";
                $resultado1 = mysqli_query($conexion, $consulta1);
            
                if($resultado1->num_rows > 0)    /*Si el usuario existe en la BD -> Se continúa*/
                {
                    $password = trim($_POST['Password']);
                    $consulta2 = "SELECT * FROM USUARIO WHERE Password='$password'";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    $totalFilasRdo2    =    mysqli_num_rows($resultado2);
                    if($totalFilasRdo2 != 0)    /*Si el usuario ha introducido la contraseña correcta -> Se loguea*/
                    {
                        ?>
                        <h3 class ="OkRegistro">¡Te has logueado correctamente!</h3>
                        <?php
                        $_SESSION['user_id'] = $username;
                        echo '<script type="text/javascript">window.location.replace("http://localhost:81/principal.php");</script>';
                        
                    }
                    else
                    {
                        ?>
                        <h3 class ="ErrorRegistro">¡La contraseña introducida no es correcta!</h3>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <h3 class ="ErrorRegistro">¡El usuario introducido no está registrado en nuestro sistema!</h3>
                    <?php
                }
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa los campos!</h3>
                <?php
            }
        }
        ?>

    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">Empéñame Esta</h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="index.php" class="nav__links"></a>
                    </li>
                    <li class="nav__items">
                        <a href="productos.php" class="nav__links"></a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links"></a>
                    </li>
                </ul>
            </nav>
            
        </section>

        <section class="footer__copy container">
            <div class="footer__">
                <a href="productos.php" class="footer__icons"><img src="./images/carrito.svg" class="footer__img"></a>
                <a href="https://github.com/EderSampayo/EmpenameEsta-SGSSI.git" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>
