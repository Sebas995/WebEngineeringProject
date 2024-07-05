<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/vender.css">
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
                        <a href="#">Vender</a>
                        <a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="../paginas/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
            </nav>
        </div>
    </header>
        <form action="../php/publicar_producto.php" method="POST" enctype="multipart/form-data">
            <section class="form-register">
                <h4>Vender Libro</h4>
                <input class="controls" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                <input class="controls" type="text" name="descripcion" id="descripcion" maxlength="200" placeholder="Descripcion" required>
                <input class="controls" type="number" name="precio" id="precio" placeholder="Precio" required>
                <input class="controls" type="number" name="cantidad" id="cantidad" placeholder="Cantidad" required>
                <select class="controls" name="categoria_id" id="categoria_id" required>
                    <option value=""></option>
                    <option value="1">Juvenil</option>
                    <option value="2">Peques</option>
                    <option value="3">Clasicos</option>
                    </select>
                <input class="controls" type="file" name="imagen" id="imagen" placeholder="Imagen" required>   
                <input class="botons" type="submit" value="Enviar">
            </section>
        </form>
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