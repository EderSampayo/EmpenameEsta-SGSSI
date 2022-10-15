<?php
    session_start();
    /*if (!isset($_SESSION['user_id'])) {
        header("location: ./iniciosesion.php");
    } else {
        header("location: ./productos.php");
    }*/
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
                    <a href="index.php" class="nav__links">Inicio</a>
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
            <h1 class="hero__title">Productos</h1>
            <p class="hero__paragraph"></p>
        </section>
    </header>

    <main>
        <section class="knowledge">
            <form action="./productos.php" method="post">
                <div class="knowledge__container container">
                    <div class="knowledge__text">
                        <h2 class="subtitle">Añadir artículo</h2>
                        <div class="footer__input">
                            <input type="nomP" name="NombreProducto" placeholder="Nombre del producto:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="descP" name="Descripcion" placeholder="Descripción:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="valor" name="Valor" placeholder="Valor:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="antiguedad" name="Antiguedad" placeholder="Antiguedad (años):" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="contra" name="MarcaAutor"placeholder="Marca/Autor:" class="footer__input">
                        </div>
                        <h6>-</h6>
                        <input type="submit" name="Anadir" value="Añadir artículo">
                    </div>
    
                    <figure class="knowledge__picture">
                        <img src="./images/CasaEmpenos.jpg" class="knowledge__img">
                    </figure>
                </div>
            </form>

            <?php
            $conexion = mysqli_connect("localhost","root","","empenameesta"); /*Adaptarlo a Docker*/
            if(isset($_POST['Anadir'])) /*Si se ha pulsado el botón con nombre Register */
            {
                if(strlen($_POST['NombreProducto']) >= 1 &&    /*Si longitud >= 1, es decir, si no está vacío*/
                strlen($_POST['Descripcion']) >= 1 &&
                strlen((string)$_POST['Valor']) >= 1 &&    /*Cast a string*/
                strlen((string)$_POST['Antiguedad']) >= 1 &&
                strlen($_POST['MarcaAutor']) >= 1)
                {
                    $nombreProducto = trim($_POST['NombreProducto']);
                    $descripcion = trim($_POST['Descripcion']);
                    $valor = trim($_POST['Valor']);

                            $valor_length = strlen((string)$valor);
                            if(!is_numeric($valor))
                            {
                                ?>
                                <h3 class ="ErrorRegistro">¡El valor solo puede contener números!</h3>
                                <?php
                            }
                            else
                            {
                                $antiguedad = trim($_POST['Antiguedad']);

                                $antiguedad_length = strlen((string)$antiguedad);
                                if(!is_numeric($antiguedad))
                                {
                                    ?>
                                    <h3 class ="ErrorRegistro">¡La antiguedad solo puede contener números!</h3>
                                    <?php
                                }
                                else
                                {
                                    $marcaAutor = trim($_POST['MarcaAutor']);

                                    /* Consulta */
                                    $consulta = "INSERT INTO Producto(Nombre, Descripcion, Valor, Antiguedad, MarcaAutor) VALUES ('$nombreProducto', '$descripcion', '$valor', '$antiguedad', '$marcaAutor')";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    if($resultado){
                                        ?>
                                        <h3 class ="OkRegistro">¡Se ha registrado el producto correctamente!</h3>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <h3 class ="ErrorRegistro">¡Ha ocurrido un error!</h3>
                                        <?php
                                    }
                                }
                            }
                }
                else
                {
                    ?>
                    <h3 class ="ErrorRegistro">¡Completa los campos!</h3>
                    <?php
                }
            }
            ?>

        </section>

        <section class="knowledge">
            <div class="knowledge__container container">
                <div class="knowledge__text">
                    <h2 class="subtitle">Nombre</h2>
                    <p class="knowledge__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi eos ea excepturi quas quidem ut exercitationem perferendis temporibus! Optio vel nihil quo esse adipisci modi! Iure quisquam minus veniam aspernatur?</p>
                    <a href="#" class="cta">Editar</a>
                    <a href="#" class="cta">Eliminar</a>
                </div>

                <figure class="knowledge__picture">
                    <img src="./images/Portatil.png" class="knowledge__img">
                </figure>
            </div>
        </section>
    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">Empéñame Esta</h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="index.php" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Productos</a>
                    </li>
                    <li class="nav__items">
                        <a href="perfil.php" class="nav__links">Perfil</a>
                    </li>
                </ul>
            </nav>
            
        </section>

        <section class="footer__copy container">
            <div class="footer__">
                <a href="#" class="footer__icons"><img src="./images/carrito.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="perfil.php" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>