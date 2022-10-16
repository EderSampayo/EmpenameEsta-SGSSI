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
            $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
            if ($conexion->connect_error)
            {
                die("Database connection failed: " . $conn->connect_error);
            }

            if(isset($_POST['Anadir'])) /*Si se ha pulsado el botón con nombre Añadir */
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

                            if(!is_numeric($valor))
                            {
                                ?>
                                <h3 class ="ErrorRegistro">¡El valor solo puede contener números!</h3>
                                <?php
                            }
                            else
                            {
                                $antiguedad = trim($_POST['Antiguedad']);

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
                                    $consulta = "INSERT INTO PRODUCTO(Nombre, Descripcion, Valor, Antiguedad, MarcaAutor) VALUES ('$nombreProducto', '$descripcion', $valor, $antiguedad, '$marcaAutor')";
                                    
                                    if(mysqli_query($conexion, $consulta)){
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


        <section class="container about">
            <h2 class="subtitle">Artículos de Empéñame Esta</h2>
            <p class="about__paragraph">Debajo se encuentran todos los artículos que tenemos registrados en Empéñame Esta.</p>

            <div class="about__main">

            <table>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Valor</td>
                    <td>Antiguedad</td>
                    <td>Marca/Autor</td>
                </tr>
                <?php

                $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
                if ($conexion->connect_error)
                {
                    die("Database connection failed: " . $conn->connect_error);
                }
                
                $consulta = "SELECT * FROM PRODUCTO";
                $resultado = mysqli_query($conexion, $consulta);

                while($mostrar = mysqli_fetch_array($resultado))
                {
                    ?>

                        <tr>
                            <td><?php echo $mostrar['Id']?></td>
                            <td><?php echo $mostrar['Nombre']?></td>
                            <td><?php echo $mostrar['Descripcion']?></td>
                            <td><?php echo $mostrar['Valor']?></td>
                            <td><?php echo $mostrar['Antiguedad']?></td>
                            <td><?php echo $mostrar['MarcaAutor']?></td>
                        </tr>

                    <?php
                }

                ?>
            </table>
            </div>
        </section>

        
        <section class="knowledge">
            <form action="./productos.php" method="post">
                <div class="knowledge__container container">
                    <div class="knowledge__text">
                        <h2 class="subtitle">Editar artículo</h2>
                        <div class="footer__input">
                            <input type="Id" name="Id2" placeholder="Id del producto:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="nomP" name="NombreProducto2" placeholder="Nuevo nombre:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="descP" name="Descripcion2" placeholder="Nueva descripción:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="valor" name="Valor2" placeholder="Nuevo valor:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="antiguedad" name="Antiguedad2" placeholder="Nueva antiguedad años:" class="footer__input">
                        </div>
                        &nbsp;
                        <div class="footer__input">
                            <input type="contra" name="MarcaAutor2"placeholder="Nueva Marca/Autor:" class="footer__input">
                        </div>
                        <h6>-</h6>
                        <input type="submit" name="Editar" value="Editar artículo">
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
            
            if(isset($_POST['Editar'])) /*Si se ha pulsado el botón con nombre Editar */
            {
                if(strlen($_POST['Id2']) >= 1 &&    /*Si longitud >= 1, es decir, si no está vacío*/
                strlen($_POST['NombreProducto2']) >= 1 &&
                strlen($_POST['Descripcion2']) >= 1 &&
                strlen((string)$_POST['Valor2']) >= 1 &&    /*Cast a string*/
                strlen((string)$_POST['Antiguedad2']) >= 1 &&
                strlen($_POST['MarcaAutor2']) >= 1)
                {
                    $id = trim($_POST['Id2']);
                    if(!is_numeric($id))
                    {
                        ?>
                        <h3 class ="ErrorRegistro">¡El Id solo puede contener números!</h3>
                        <?php
                    }
                    else
                    {
                        $consultaId = "SELECT * FROM PRODUCTO WHERE Id= $id";
                        $resultadoId = mysqli_query($conexion, $consultaId);
                        if($resultadoId->num_rows <= 0)   /* Si el Id no existe en nuestra BD -> No se puede editar!*/
                        {
                            ?>
                            <h3 class ="ErrorRegistro">¡El Id introducido no está registrado en nuestro sistema!</h3>
                            <?php
                        }
                        else if(!$resultadoId)
                        {
                            ?>
                            <h3 class ="ErrorRegistro">¡Ha ocurrido un error!</h3>
                            <?php
                        }
                        else    /* El ID está en la BD */
                        {
                            $nombreProducto = trim($_POST['NombreProducto2']);
                            $descripcion = trim($_POST['Descripcion2']);
                            $valor = trim($_POST['Valor2']);

                                    if(!is_numeric($valor))
                                    {
                                        ?>
                                        <h3 class ="ErrorRegistro">¡El valor solo puede contener números!</h3>
                                        <?php
                                    }
                                    else
                                    {
                                        $antiguedad = trim($_POST['Antiguedad2']);
                                    
                                        if(!is_numeric($antiguedad))
                                        {
                                            ?>
                                            <h3 class ="ErrorRegistro">¡La antiguedad solo puede contener números!</h3>
                                            <?php
                                        }
                                        else
                                        {
                                            $marcaAutor = trim($_POST['MarcaAutor2']);
                                        
                                            /* Consulta */
                                            $consulta = "UPDATE PRODUCTO SET Nombre='$nombreProducto', Descripcion='$descripcion', Valor='$valor', Antiguedad='$antiguedad', MarcaAutor='$marcaAutor' WHERE Id='$id'";
                                            $resultado = mysqli_query($conexion, $consulta);
                                        
                                            if($resultado){
                                                ?>
                                                <h3 class ="OkRegistro">¡Se ha editado el producto correctamente! Recargue la página para que se muestran los nuevos datos.</h3>
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
            <form action="./productos.php" method="post">
                <div class="knowledge__container container">
                    <div class="knowledge__text">
                        <h2 class="subtitle">Eliminar artículo</h2>
                        <div class="footer__input">
                            <input type="Id" name="Id3" placeholder="Id del producto:" class="footer__input">
                        </div>
                        <h6>-</h6>
                        <input type="submit" name="Eliminar" value="Eliminar artículo">
                    </div>
                </div>
            </form>
            <?php
        $conexion = mysqli_connect('db','admin','admin1','empenameesta'); 
        if ($conexion->connect_error)
        {
            die("Database connection failed: " . $conn->connect_error);
        }
        
        if(isset($_POST['Eliminar'])) /*Si se ha pulsado el botón con nombre InicSesion */
        {
            $id = trim($_POST['Id3']);
            $consultaId = "SELECT * FROM PRODUCTO WHERE Id = $id";
            $resultadoId = mysqli_query($conexion, $consultaId);
            if($resultadoId->num_rows == 0)   /* Si el Id no existe en nuestra BD -> No se puede editar!*/
            {
                ?>
                <h3 class ="ErrorRegistro">¡El Id introducido no está registrado en nuestro sistema!</h3>
                <?php
            }
            else if(!$resultadoId)
            {
                ?>
                <h3 class ="ErrorRegistro">¡Ha ocurrido un error!</h3>
                <?php
            }
            else    /* El ID está en la BD */
            {
                $consulta = "DELETE FROM PRODUCTO WHERE Id= $id";
                $resultado = mysqli_query($conexion, $consulta);
            
                if($resultado){
                    ?>
                    <h3 class ="OkRegistro">¡Se ha eliminado el producto correctamente! Recargue la página para que se muestran los nuevos datos.</h3>
                    <?php
                }
                else{
                    ?>
                    <h3 class ="ErrorRegistro">¡Ha ocurrido un error!</h3>
                    <?php
                }
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
                        <a href="principal.php" class="nav__links">Inicio</a>
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
                <a href="https://github.com/EderSampayo/EmpenameEsta-SGSSI.git" class="footer__icons"><img src="./images/github.svg" class="footer__img"></a>
                <a href="perfil.php" class="footer__icons"><img src="./images/usuario.svg" class="footer__img"></a>
            </div>
        </section>
    </footer>


    <script src="js/slider.js"></script>
    <script src="./js/preguntas.js"></script>
</body>
</html>
