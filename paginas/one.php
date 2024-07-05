<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/one.css"> 
</head>
<body>
    <header>
        <div id ="menu" class="container">
            <p class="logo">Librería_Sisiescontigo</p>
            <nav>
            <a href= "../index.php #Todos-a-leer">Inicio</a>
                <a href="./catalogo.php">Catálogo</a>
                <a href="../index.php #como-contactarnos">Como Contactarnos </a>
                <?php
                    session_start();

                    if (isset($_SESSION["usuario"])){
                        echo '
                        <a href="../paginas/vender.php">Vender</a>
                        <a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="../paginas/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
            </nav>
        </div>
        
    </header>
        </head>
            <?php
                if (isset($_GET["producto_id"])){
                    $tipo_imagen = 'image/jpeg'; 
                    $publicacion = $_SESSION["ver_publicacion"];
                    $imagen_codificada = base64_encode($publicacion["imagen"]);
                    $imagen_data_url = "data:$tipo_imagen;base64,$imagen_codificada";
                    
                    echo '
                    <form action="../php/comprar_producto.php" method="POST">
                        <div class="card-group">
                            <div class="card">
                            <p class="card-body"><b>Cantidad:'.$publicacion["cantidad"].'</b></p>
                            <img src="'.$imagen_data_url.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$publicacion["nombre"].'</h5>
                                <p class="card-text">'.$publicacion["descripcion"].'</p>
                                <p class="card-text"><small class="text-muted">$'.number_format($publicacion["precio"]).'</small> <input type="submit" value="Comprar" class="btn"></p>
                            </div>
                            </div>
                            <input type="input" name="publicacion_id" id="publicacion_id" value="'.$publicacion["id"].'" hidden>
                            <input type="input" name="cantidad" id="cantidad" value="1" hidden>
                        </div>     
                    </form>';

                } else {
                    header("Location: ../paginas/catalogo.php");
                }
            ?>   
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
  
</body>
</html>