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
                    <a href="index.html" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="productos.html" class="nav__links">Productos</a>
                </li>
                <li class="nav__items">
                    <a href="iniciosesion.html" class="nav__links">Iniciar sesión</a>
                </li>

                <img src="images/cerrar.svg" class="nav__close" alt=""> 
            </ul>

            <div class="nav__menu">
                <img src="images/menu.svg" class="nav__close" alt="">
            </div>
        </nav>

        <section class="hero__container container">
            <h1 class="hero__title">Casa de Empeños</h1>
            <h1 class="hero__title">Empéñame Esta</h1>
            <p class="hero__paragraph"></p>
            <p class="hero__paragraph">Ya era hora de elegir la mejor casa de empeños</p>
            <a href="productos.html" class="cta">Empeña ahora</a>
        </section>
    </header>

    <main>
        <section class="container about">
            <h2 class="subtitle">¿Qué encontrarás en Empéñame Esta?</h2>
            <p class="about__paragraph">Encontrarás todo tipo de artículos en la mejor casa de empeños del mundo, tanto relacionados con el mundo de la informática, como con otro tipo de sectores. Entre estos artículos se encuentran ordenadores, auriculares, coches... ¡Y muchas cosas más!</p>

            <div class="about__main">
                <article class="about__icons">
                    <img src="./images/ordenador.svg" class="about__icon">
                    <h3 class="about__title">Ordenadores</h3>
                    <p class="about__paragraph">Ordenadores de última generación tanto para trabajar de forma fluida, como para jugar a tus videojuegos favoritos. Además, muchos de nuestros ordenadores cuentan con la nueva serie 4000 de las gráficas de NVIDIA.</p>
                </article>
                <article class="about__icons">
                    <img src="./images/movil.svg" class="about__icon">
                    <h3 class="about__title">Móviles</h3>
                    <p class="about__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum atque, tempore nesciunt, impedit officia qui expedita quasi aliquam, quidem doloribus minus dolore consequatur quo. Recusandae suscipit unde dicta fugit id!</p>
                </article>
                <article class="about__icons">
                    <img src="./images/coche.svg" class="about__icon">
                    <h3 class="about__title">Coches</h3>
                    <p class="about__paragraph">Todo tipo de coches, tanto eléctricos, como diésel y gasolina. Además, tenemos una promoción especial en todos los coches eléctricos de la compañía Tesla, gracias a Elon Musk (uno de los mejores clientes de nuestra tienda)</p>
                </article>
            </div>
        </section>

        <section class="knowledge">
            <div class="knowledge__container container">
                <div class="knowledge__text">
                    <h2 class="subtitle">Curso completo</h2>
                    <p class="knowledge__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi eos ea excepturi quas quidem ut exercitationem perferendis temporibus! Optio vel nihil quo esse adipisci modi! Iure quisquam minus veniam aspernatur?</p>
                    <a href="#" class="cta">Entra al curso</a>
                </div>

                <figure class="knowledge__picture">
                    <img src="./images/Portatil.png" class="knowledge__img">
                </figure>
            </div>
        </section>

        <section class="testimony">
            <div class="testimony__container container">
                <img src="./images/flechaIzq.svg" class="testimony__arrow" id="before">
                
                <section class="testimony__body testimony__body--show" data-id="1">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Elon Musk, <span class="testimony__course">Fundador de SpaceX</span></h2>
                        <p class="testimony__review">Empéñame Esta es la mejor casa de empeños en la que he estado en mi vida. Tienen las mejores ofertas y muchos de los componentes que utilizo para SpaceX y Tesla los he adquirido aquí.</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="./images/ElonMusk2.JPG" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="2">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Hasbulla Magomedov, <span class="testimony__course">Estudiante de SGSSI</span></h2>
                        <p class="testimony__review">Очень хороший ломбард. Мне очень нравится там еда. Здесь я купил своего лучшего друга, обезьяну. Хотел бы я жить здесь.</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="./images/Hasbulla.JPG" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es El Dandy de Barcelona, <span class="testimony__course">que por donde pasa enamora</span></h2>
                        <p class="testimony__review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, asperiores exercitationem architecto nam quae mollitia, consectetur tenetur expedita ab facere magni, ratione quisquam saepe nihil impedit? Eveniet temporibus distinctio nihil.</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="./images/Dandy.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="4">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mono <span class="testimony__course">(Mono)</span></h2>
                        <p class="testimony__review">Jajaja un mono.</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="./images/Monke.png" class="testimony__img">
                    </figure>
                </section>

                <img src="./images/flechaDer.svg" class="testimony__arrow" id="next">
            </div>
        </section>

        <section class="questions container">
            <h2 class="subtitle">Preguntas frecuentes</h2>
            <p class="questions__paragraph">En la sección de preguntas frecuentes podrás encontrar las preguntas que nos llegan día a día a nuestro correo electrónico y redes sociales. Esperemos que después de esto no nos lleguen más preguntas igual.</p>
        
            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué es Empéñame Esta?
                            <span class="questions__arrow">
                                <img src="./images/flecha.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Empéñame Esta es, en pocas palabras, la mejor casa de empeños del mundo. Trabajamos 24 horas al día, 7 días a la semana y 365 días al año para que nuestros clientes sean lo más felices posibles.</p>
                    </div>
                </article>
            </section>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué artículos puedo encontrar en Empéñame Esta?
                            <span class="questions__arrow">
                                <img src="./images/flecha.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">En Empéñame Esta podrás encontrar todo tipo de artículos, desde ordenadores y teléfonos móviles, hasta coches y todo tipo de artículos electrónicos y antiguedades. Además, nuestros artículos tienen las mejores ofertas, ya que tenemos acuerdos con los magnates de la actualidad.</p>
                    </div>
                </article>
            </section>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Cómo puedo empeñar un artículo?
                            <span class="questions__arrow">
                                <img src="./images/flecha.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Para empeñar un artículo, tienes que ir a la sección de "Productos" de nuestra página web. Ahí, podrás introducir los datos del artículo que deseas empeñar. Además, debajo de la opción de inserción de productos podrás encontrar todos los artículos que poseemos en nuestra tienda.</p>
                    </div>
                </article>
            </section>
        </section>
    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav--footer">
                <h2 class="footer__title">Empéñame Esta</h2>

                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="#" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="productos.html" class="nav__links">Productos</a>
                    </li>
                    <li class="nav__items">
                        <a href="iniciosesion.html" class="nav__links">Iniciar sesión</a>
                    </li>
                </ul>
            </nav>
            
        </section>

        <section class="footer__copy container">
            <div class="footer__">
                <a href="productos.html" class="footer__icons"><img src="./images/carrito.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="#" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>