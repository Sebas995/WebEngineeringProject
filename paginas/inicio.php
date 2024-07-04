<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/pila-libros-diseno-plano-dibujado-mano_23-2149334862.jpg?w=740&t=st=1720045562~exp=1720046162~hmac=c98e6f4bb3daf7e3e46c115a014c5d5edfc42a94526094c83b118cec285e0e4e">
</head>
<body>
    <header>
        <div id ="menu" class="container">
            <p class="logo"><a href="../index.php #Todos-a-leer">Librería_Sisiescontigo</a></p>
            <nav>
                <a href= "../index.php #Todos-a-leer">Inicio</a>
                <a href="./catalogo.php">Catálogo</a>
                <a href="../index.php #como-contactarnos">Como Contactarnos </a>
                <?php
                    if (isset($_SESSION["usuario"])){
                        echo '<a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
            </nav>
        </div>
    </header>

        <section class="form-login">
            <div class="container">
                <form action="../php/iniciar_sesion.php" method="POST">
                <h5>Formulario Login</h5>
                    <input class="controls" type="text" id="correo" name="correo" value="" placeholder="Correo">
                    <input class="controls" type="password" id="contrasena" name="contrasena" value="" placeholder="Contraseña">
                    <input class="buttons" type="submit" name="" value="Ingresar">
                    <p><a href="#">Registrarse</a></p>
                </form>
            </div>
        </section>

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
            <a href="../index.php">Comienza Ahora</a>
        
        </button>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Laura_Juan</p>
        </div>
    </footer>
  
</body>
    <?php
        session_start();

        if (isset($_SESSION["usuario_no_encontrado"])){
            echo '<script>alert("' . $_SESSION["usuario_no_encontrado"] . '");</script>';
            unset($_SESSION["usuario_no_encontrado"]);
        }
    ?>
</html>