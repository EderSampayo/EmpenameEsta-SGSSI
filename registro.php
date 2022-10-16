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
        <section class="knowledge">
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
                            <input type="dni" name="DNI" placeholder="DNI: (formato: 11111111Z)" class="footer__input">
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
            $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
            if ($conexion->connect_error)
            {
                die("Database connection failed: " . $conn->connect_error);
            }
            if(isset($_POST['Register'])) /*Si se ha pulsado el botón con nombre Register */
            {
                if(strlen($_POST['Username']) >= 1 &&    /*Si longitud >= 1, es decir, si no está vacío*/
                strlen($_POST['Password']) >= 1 &&
                strlen($_POST['NomApe']) >= 1 &&
                strlen((string)$_POST['DNI']) >= 1 &&    /*Cast a string*/
                strlen((string)$_POST['Telefono']) >= 1 &&
                strlen($_POST['FechaNacimiento']) >= 1 &&
                strlen($_POST['Email']) >= 1)
                {
                    $username = trim($_POST['Username']); /*Trim quita el espacio del principio y del final*/

                    $consulta2 = "SELECT * FROM USUARIO WHERE Username='$username'";
                    $resultado2 = mysqli_query($conexion, $consulta2);

                    if($resultado2->num_rows == 0)    /*Si el usuario no existe en la BD -> Se añade*/
                    {
                        $password = trim($_POST['Password']);
                        $nomApe = trim($_POST['NomApe']);
                        $dni = trim($_POST['DNI']);
                        $fechaNacimiento = trim($_POST['FechaNacimiento']);

                        /*if (!ctype_alpha('$nomApe')) { /*Si no tiene solo texto */
                        /*   ?>
                            <h3 class ="ErrorRegistro">¡"Nombre y Apellidos" solo aceptan texto!</h3>
                            <?php
                        } else {*/
                            $dni = trim($_POST['DNI']);
                            
                            function es_dni_valido($dni){
                                $dni_length = strlen((string)$dni);
                                if($dni_length != 9)
                                {
                                    return false;
                                }
                                if (preg_match("#^[0-9]{8}[A-Z]{1}+$#", $dni))     /* Si tiene el formato correcto */
                               {
                                    $letter = substr($dni, -1);
                                    $numbers = substr($dni, 0, -1);
                                    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 )    /* Si la letra corresponde con los números*/
                                  {
                                            return true;
                                    }
                                    return false;
                                }
                            }
                            
                            
                            if(!es_dni_valido($dni))
                            {
                                ?>
                                <h3 class ="ErrorRegistro">¡El DNI no es válido!</h3>
                                <?php
                            }
                            else{
                                $telefono = trim($_POST['Telefono']);

                                $tlf_length = strlen((string)$telefono);
                                if(!is_numeric($telefono))
                                {
                                    ?>
                                    <h3 class ="ErrorRegistro">¡El teléfono solo puede contener números!</h3>
                                    <?php
                                }
                                else if($tlf_length != 9)
                                {
                                    ?>
                                    <h3 class ="ErrorRegistro">¡El teléfono tiene que tener 9 dígitos!</h3>
                                    <?php
                                }
                                else
                                {
                                    $fechaNacimiento = date("Y-m-d");
                                    function validateDate($date, $format = 'Y-m-d')
                                        {
                                            $d = DateTime::createFromFormat($format, $date);
                                            // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
                                            return $d && $d->format($format) === $date;
                                        }
                                    if(!validateDate($fechaNacimiento)) /* Creo que funciona :)*/
                                   {
                                        ?>
                                        <h3 class ="ErrorRegistro">¡La fecha de nacimiento introducida no es válida!</h3>
                                        <?php
                                    }
                                    else{
                                        $email = trim($_POST['Email']);
            
                                        $consulta = "INSERT INTO USUARIO VALUES ('$username', '$password', '$nomApe', '$dni', $telefono, '$fechaNacimiento', '$email')";
                                        $resultado = mysqli_query($conexion, $consulta);
            
                                        if($resultado){
                                            ?>
                                            <h3 class ="OkRegistro">¡Te has registrado correctamente!</h3>
                                            <?php
                                            $_SESSION['user_id'] = $Username;
                                            echo '<script type="text/javascript">window.location.replace("http://localhost:81/principal.php");</script>';
                                        }
                                        else{
                                            ?>
                                            <h3 class ="ErrorRegistro">¡Ha ocurrido un error!</h3>
                                            <?php
                                        }
                                    }
                                }
                            }
                        /*}*/
                    }
                    else{
                        ?>
                        <h3 class ="ErrorRegistro">¡El nombre de usuario ya está registrado en nuestro sistema!</h3>
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
        </section>

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
                <a href="https://github.com/EderSampayo/EmpenameEsta-SGSSI.git" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>
