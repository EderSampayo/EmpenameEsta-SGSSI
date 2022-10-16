<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo '<script type="text/javascript">window.location.replace("http://localhost:81/iniciosesion.php");</script>';
    }
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
                    <a href="principal.php" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="productos.php" class="nav__links">Productos</a>
                </li>
                <li class="nav__items">
                    <a href="perfil.php" class="nav__links">Perfil</a>
                </li>

                <img src="images/cerrar.svg" class="nav__close" alt=""> 
            </ul>

            <div class="nav__menu">
                <img src="images/menu.svg" class="nav__close" alt="">
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Perfil</h1>
            <p class="hero__paragraph"></p>
        </section>
    </header>

    <main>
        <section class="knowledge">

            <?php
            /* Mensaje de bienvenida*/
            echo "<h3> Bienvenido " . $_SESSION['user_id'];
            ?>
            <form action="./perfil.php" method="post">
                <div class="knowledge__container container">
                    <div class="knowledge__text">
                        <h2 class="subtitle">Cambio de datos</h2>
                        <div class="footer__input">
                            <input type="nombreYape" name="NomYApe" placeholder="Nombre y Apellidos:" class="footer__input">
                        </div>
                        <input type="submit" name="CambiarNomYApe" value="Cambiar">
                        <h6>-</h6>
                        &nbsp;

                        <div class="footer__input">
                            <input type="dni" name="DNI" placeholder="DNI:" class="footer__input">
                        </div>
                        <input type="submit" name="CambiarDNI" value="Cambiar">
                        <h6>-</h6>
                        &nbsp;

                        <div class="footer__input">
                            <input type="telefono" name="Telefono" placeholder="Teléfono:" class="footer__input">
                        </div>
                        <input type="submit" name="CambiarTlf" value="Cambiar">
                        <h6>-</h6>
                        &nbsp;

                        <div class="footer__input">
                            <input type="fechaNacimiento" name="FNac" placeholder="Fecha de Nacimiento:" class="footer__input">
                        </div>
                        <input type="submit" name="CambiarFNac" value="Cambiar">
                        <h6>-</h6>
                        &nbsp;

                        <div class="footer__input">
                            <input type="email" name="Email" placeholder="Email:" class="footer__input">
                        </div>
                        <input type="submit" name="CambiarEmail" value="Cambiar">
                        <h6>-</h6>
                    </div>

                    <figure class="knowledge__picture">
                        <img src="./images/CasaEmpenos.jpg" class="knowledge__img">
                    </figure>
                </div>
            </form>

            <?php
        $usuario = $_SESSION['user_id'];
        /*==================*/
        /*NOMBRE Y APELLIDOS*/
        /*==================*/
        if(isset($_POST['CambiarNomYApe'])) /*Si se ha pulsado el botón con nombre InicSesion */
        {
            if(strlen($_POST['NomYApe']) >= 1)   /*Si longitud >= 1, es decir, si no está vacío*/
            {
                $nomApe = trim($_POST['NomApe']);
                /*if (!preg_match("#^[a-zA-Z]+$#", $nomApe)) { /*Si no tiene solo texto */
                /*    ?>
                    <h3 class ="ErrorRegistro">¡"Nombre y Apellidos" solo aceptan texto!</h3>
                    <?php
                 } 
                 else 
                 {*/
                    $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                    if ($conexion->connect_error)
                    {
                        die("Database connection failed: " . $conn->connect_error);
                    }

                    $consulta = "UPDATE USUARIO SET NombreYApellidos = '$nomApe' WHERE Username = '$usuario'";
                    $resultado = mysqli_query($conexion, $consulta);
        
                    if($resultado){
                        ?>
                        <h3 class ="OkRegistro">¡Nombre y apellidos cambiados correctamente!</h3>
                        <?php
                    }
                    else{
                        ?>
                        <h3 class ="ErrorRegistro">¡No se han podido cambiar el nombre y apellidos!</h3>
                        <?php
                    }
                /*}*/
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa el campo!</h3>
                <?php
            }
        }

        /*==================*/
        /*DNI*/
        /*==================*/

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

        if(isset($_POST['CambiarDNI']))
        {
            if(strlen($_POST['DNI']) >= 1)
            {
                $dni = trim($_POST['DNI']);
                if(!es_dni_valido($dni)) {
                    ?>
                    <h3 class ="ErrorRegistro">¡El DNI no es válido!</h3>
                    <?php
                 } 
                 else 
                 {
                    $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                    if ($conexion->connect_error)
                    {
                        die("Database connection failed: " . $conn->connect_error);
                    }
                    
                    $consulta = "UPDATE USUARIO SET DNI = '$dni' WHERE Username = '$usuario'";
                    $resultado = mysqli_query($conexion, $consulta);
        
                    if($resultado){
                        ?>
                        <h3 class ="OkRegistro">¡DNI cambiado correctamente!</h3>
                        <?php
                    }
                    else{
                        ?>
                        <h3 class ="ErrorRegistro">¡No se ha podido cambiar el DNI!</h3>
                        <?php
                    }
                 }
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa el campo!</h3>
                <?php
            }
        }

        /*==================*/
        /*TELÉFONO*/
        /*==================*/

        if(isset($_POST['CambiarTlf']))
        {
            if(strlen($_POST['Telefono']) >= 1)
            {
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
                    $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                    if ($conexion->connect_error)
                    {
                        die("Database connection failed: " . $conn->connect_error);
                    }

                    
                    $consulta = "UPDATE USUARIO SET Telefono = $telefono WHERE Username = '$usuario'";
                    $resultado = mysqli_query($conexion, $consulta);
        
                    if($resultado){
                        ?>
                        <h3 class ="OkRegistro">¡Teléfono cambiado correctamente!</h3>
                        <?php
                    }
                    else{
                        ?>
                        <h3 class ="ErrorRegistro">¡No se ha podido cambiar el Teléfono!</h3>
                        <?php
                    }
                }
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa el campo!</h3>
                <?php
            }
        }

        /*==================*/
        /*FECHA DE NACIMIENTO*/
        /*==================*/

        if(isset($_POST['CambiarFNac']))
        {
            if(strlen($_POST['FNac']) >= 1)
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
                else 
                {
                    $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                    if ($conexion->connect_error)
                    {
                        die("Database connection failed: " . $conn->connect_error);
                    }

                    
                    $consulta = "UPDATE USUARIO SET FechaNac = '$fechaNacimiento' WHERE Username = '$usuario'";
                    $resultado = mysqli_query($conexion, $consulta);
        
                    if($resultado){
                        ?>
                        <h3 class ="OkRegistro">¡Fecha de nacimiento cambiada correctamente!</h3>
                        <?php
                    }
                    else{
                        ?>
                        <h3 class ="ErrorRegistro">¡No se ha podido cambiar la fecha de nacimiento!</h3>
                        <?php
                    }
                }
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa el campo!</h3>
                <?php
            }
        }

        /*==================*/
        /*EMAIL*/
        /*==================*/

        if(isset($_POST['CambiarEmail']))
        {
            if(strlen($_POST['Email']) >= 1)
            {
                $email = trim($_POST['Email']);
                $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                if ($conexion->connect_error)
                {
                    die("Database connection failed: " . $conn->connect_error);
                }
                    
                $consulta = "UPDATE USUARIO SET Email = '$email' WHERE Username = '$usuario'";
                $resultado = mysqli_query($conexion, $consulta);
    
                if($resultado){
                    ?>
                    <h3 class ="OkRegistro">¡Email cambiado correctamente!</h3>
                    <?php
                }
                else{
                    ?>
                    <h3 class ="ErrorRegistro">¡No se ha podido cambiar el email!</h3>
                    <?php
                }
            }
            else{
                ?>
                <h3 class ="ErrorRegistro">¡Completa el campo!</h3>
                <?php
            }
        }

        ?>
        <section class="container about">
            <h2 class="subtitle">Datos personales</h2>
            <p class="about__paragraph">Debajo se encuentran todos los datos que tenemos registrados en Empéñame Esta.</p>

            <div class="about__main">
            <table>
                    <tr>
                        <td>Nombre de Usuario</td>
                        <td>Nombre y apellidos</td>
                        <td>DNI</td>
                        <td>Teléfono</td>
                        <td>Fecha de nacimiento</td>
                        <td>Email</td>
                    </tr>
                    <?php

                    $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                    if ($conexion->connect_error)
                    {
                        die("Database connection failed: " . $conn->connect_error);
                    }
                    
                    $usuario = $_SESSION['user_id'];
                    $consulta = "SELECT * FROM USUARIO WHERE Username = '$usuario'";
                    $resultado = mysqli_query($conexion, $consulta);

                    while($mostrar = mysqli_fetch_array($resultado))
                    {
                        ?>

                            <tr>
                                <td><?php echo $mostrar['Username']?></td>
                                <td><?php echo $mostrar['NombreYApellidos']?></td>
                                <td><?php echo $mostrar['DNI']?></td>
                                <td><?php echo $mostrar['Telefono']?></td>
                                <td><?php echo $mostrar['FechaNac']?></td>
                                <td><?php echo $mostrar['Email']?></td>
                            </tr>

                        <?php
                    }

                    ?>
                </table>
                </div>    
        </section>
    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">Empéñame Esta</h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="principal.php" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="productos.php" class="nav__links">Productos</a>
                    </li>
                    <li class="nav__items">
                        <a href="perfil.php" class="nav__links">Perfil</a>
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
