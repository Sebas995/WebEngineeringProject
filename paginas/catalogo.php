<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/catalogo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/catalogo.css">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/pila-libros-diseno-plano-dibujado-mano_23-2149334862.jpg?w=740&t=st=1720045562~exp=1720046162~hmac=c98e6f4bb3daf7e3e46c115a014c5d5edfc42a94526094c83b118cec285e0e4e">
</head>
<body>
    <header>
        <div id ="menu" class="container">
        <p class="logo"><a href="../index.php">Librería_Sisiescontigo</a></p>
            <nav>
                 <a href= "../index.php #Todos-a-leer">Inicio</a>
                <a href="#">Catálogo</a>
                <a href="../index.php #como-contactarnos">Como Contactarnos </a>
                <?php
                    if (isset($_SESSION["usuario"])){
                        echo '
                        <a href="../paginas/vender.php">Vender</a>                        
                        <a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="../paginas/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
        </div>
        
    </header>
<br> <br>
            <title>Buscador Web</title>
        </head>
        <body>
            <div id="container">
                <form class="container" action="../php/obtener_publicacion.php" method="POST">
                    <?php
                        if (isset($_GET['buscar'])){
                            echo '<input type="text" id="busqueda" name="busqueda" value="' . $_GET['buscar'] . '" placeholder="Buscar aquí...">';
                        } else {
                            echo '<input type="text" id="busqueda" name="busqueda" placeholder="Buscar aquí...">';
                        }
                    ?>
                    <button type="submit">Buscar</button>
                </form>
                <hr>
                <div id="container" class="card-group">
                <?php
                    $tipo_imagen = 'image/jpeg'; 

                    if (isset($_SESSION["publicacion"])){
                            $publicacion = $_SESSION["publicacion"];
                            $imagen_codificada = base64_encode($publicacion["imagen"]);
                            $imagen_data_url = "data:$tipo_imagen;base64,$imagen_codificada";
                            echo ' <form>
                                        <div class="card">
                                            <p class="card-text">Cantidad:'.$publicacion["cantidad"].' <a class="ver-mas" href="../php/ver_producto.php?publicacion_id='.$publicacion["id"].'">Ver mas</a></p>
                                            <img src="'.$imagen_data_url.'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$publicacion["nombre"].'</h5>
                                                <p class="card-text">'.$publicacion["descripcion"].'</p>
                                                <p class="card-text"><small class="text-muted">$'.number_format($publicacion["precio"]).'</small><input type="submit" value="Comprar" class="btn"></p>
                                            </div>
                                        </div> 
                                </form>';
                                unset($_SESSION["publicacion"]);
                    }

                    if (isset($_SESSION["publicaciones"])){
                        
                        foreach ($_SESSION["publicaciones"] as $publicaciones => $publicacion) {
                            $imagen_codificada = base64_encode($publicacion["imagen"]);
                            $imagen_data_url = "data:$tipo_imagen;base64,$imagen_codificada";
                            echo ' <form>
                                        <div class="card">
                                            <p class="card-text">Cantidad:'.$publicacion["cantidad"].' <a class="ver-mas" href="../php/ver_producto.php?publicacion_id='.$publicacion["id"].'">Ver mas</a></p>
                                            <img src="'.$imagen_data_url.'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">'.$publicacion["nombre"].'</h5>
                                                <p class="card-text">'.$publicacion["descripcion"].'</p>
                                                <p class="card-text"><small class="text-muted">$'.number_format($publicacion["precio"]).'</small><input type="submit" value="Comprar" class="btn"></p>
                                            </div>
                                        </div> 
                                </form>';
                        }
                        unset($_SESSION["publicaciones"]);
                    }


                ?>
            </div> 
        <section id="como-contactarnos">
            <div class="container">
                <ul>
                    <li>💻​ @Librería_Sisiescontigo</li>
                    <li>☎️​ 3024098280</li>
                    <li>🌎​ Bogota_Colombia</li>
                    <li>​💬 LibreriaSisiescontigo@gmail.com</li>
                </ul>
            </div>
        </section>

    <section id="final">
        <h2>Nunca es tarde para leer un buen libro</h2>
        <button>
            <a href="../paginas/inicio.php">Comienza Ahora</a>
        
        </button>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Laura_Juan</p>
        </div>
    </footer>
    <?php

        if (isset($_SESSION["publicacion_creada"])){
            echo '<script>alert("' . $_SESSION["publicacion_creada"] . '");</script>';
            unset($_SESSION["publicacion_creada"]);
        }

        if (isset($_SESSION["compra_creada"])){
            echo '<script>alert("' . $_SESSION["compra_creada"] . '");</script>';
            unset($_SESSION["compra_creada"]);
        }
    ?>
</body>
</html>