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
            <h1 class="hero__title">Registro</h1>
            <p class="hero__paragraph"></p>
        </section>
    </header>

    <main>
        <form action="./registro.php" method="post">
            <div class="knowledge__container container">
                <div class="knowledge__text">
                    <h2 class="subtitle">Registro</h2>
                    <div class="footer__input">
                        <input type="username" name="Username" placeholder="Username:" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="contra" name="Password" placeholder="Contraseña:" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="nombreYape" name="NomApe" placeholder="Nombre y Apellidos:" class="footer__input">
                    </div>
                    <h6 style="color:#808080">-> (solo texto) Ejemplo: Pepe García</h6>
                    &nbsp;
                    <div class="footer__input">
                        <input type="dni" name="DNI" placeholder="DNI: (formato: 11111111-Z)" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="telefono" name="Telefono" placeholder="Teléfono: (9 dígitos)" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="fechaNacimiento" name="FechaNacimiento" placeholder="Fecha de Nacimiento:" class="footer__input">
                        <h6 style="color:#808080">-> formato: aaaa-mm-dd (1999-08-26)</h6>
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="email" name="Email" placeholder="Email: solo válidos" class="footer__input">
                    </div>
                    <h6 style="color:#808080">-> (ejemplo@servidor.extensión)</h6>
                    <input type="submit" name="Register" value="Registrarse">
                </div>

                <figure class="knowledge__picture">
                    <img src="./images/CasaEmpenos.jpg" class="knowledge__img">
                </figure>
            </div>
        </form>

        <?php
        $conexion = mysqli_connect("localhost","root","","empenameesta"); /*Adaptarlo a Docker*/
        if(isset($_POST['Register'])) /*Si se ha pulsado el botón con nombre Register */
        {
            if(strlen($_POST['Username']) >= 1 &&    /*Si longitud >= 1*/
            strlen($_POST['Password']) >= 1 &&
            strlen($_POST['NomApe']) >= 1 &&
            strlen((string)$_POST['DNI']) >= 1 &&    /*Cast a string*/
            strlen((string)$_POST['Telefono']) >= 1 &&
            strlen($_POST['FechaNacimiento']) >= 1 &&
            strlen($_POST['Email']) >= 1)
            {
                $username = trim($_POST['Username']); /*Trim quita el espacio del principio y del final*/
                $password = trim($_POST['Password']);
                $nomApe = trim($_POST['NomApe']);
                $dni = trim($_POST['DNI']);
                $telefono = trim($_POST['Telefono']);
                $fechaNacimiento = date("d/m/y");
                $email = trim($_POST['Email']);

                $consulta = "INSERT INTO Usuario VALUES ('$username', '$password', '$nomApe', '$dni', $telefono, '$fechaNacimiento', '$email')";
                $resultado = mysqli_query($conexion, $consulta);

                if($resultado){
                    ?>
                    <h3 class ="registradoCorrectamente">¡Te has registrado correctamente!</h3>
                    <?php
                }
                else{
                    ?>
                    <h3 class ="registroError">¡Ha ocurrido un error!</h3>
                    <?php
                }
            }
            else{
                ?>
                <h3 class ="registroError">¡Completa los campos!</h3>
                <?php
            }
        }
        /*if($conexion)
        {
            echo "todo correcto";
        }*/
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
                        <a href="iniciosesion.php" class="nav__links"></a>
                    </li>
                </ul>
            </nav>
            
        </section>

        <section class="footer__copy container">
            <div class="footer__">
                <a href="productos.php" class="footer__icons"><img src="./images/carrito.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>