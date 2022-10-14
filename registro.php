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
                        <input type="email" placeholder="Username:" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="contra" placeholder="Contraseña:" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="nombreYape" placeholder="Nombre y Apellidos:" class="footer__input">
                    </div>
                    <h6 style="color:#808080">-> (solo texto) Ejemplo: Pepe García</h6>
                    &nbsp;
                    <div class="footer__input">
                        <input type="dni" placeholder="DNI: (formato: 11111111-Z)" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="telefono" placeholder="Teléfono: (9 dígitos)" class="footer__input">
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="fechaNacimiento" placeholder="Fecha de Nacimiento:" class="footer__input">
                        <h6 style="color:#808080">-> formato: aaaa-mm-dd (1999-08-26)</h6>
                    </div>
                    &nbsp;
                    <div class="footer__input">
                        <input type="email" placeholder="Email: solo válidos" class="footer__input">
                    </div>
                    <h6 style="color:#808080">-> (ejemplo@servidor.extensión)</h6>
                    <input type="submit" name="sub" value="Registrarse">
                </div>

                <figure class="knowledge__picture">
                    <img src="./images/CasaEmpenos.jpg" class="knowledge__img">
                </figure>
            </div>
        </form>
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