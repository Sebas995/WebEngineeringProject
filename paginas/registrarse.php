<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/registrarse.css">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/pila-libros-diseno-plano-dibujado-mano_23-2149334862.jpg?w=740&t=st=1720045562~exp=1720046162~hmac=c98e6f4bb3daf7e3e46c115a014c5d5edfc42a94526094c83b118cec285e0e4e">
</head>
<body>
    <header>
        <div id ="menu" class="container">
        <p class="logo"><a href="../index.php">Librería_Sisiescontigo</a></p>
            <nav>
                <a href= "../index.php #Todos-a-leer">Inicio</a>
                <a href="./catalogo.php">Catálogo</a>
                <a href="../index.php #como-contactarnos">Como Contactarnos </a>
                <?php
                    session_start();

                    if (isset($_SESSION["usuario"])){
                        echo '<a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="./inicio.php">Iniciar Sesion</a>';
                    }
                ?>
            </nav>
        </div>
    </header>
        <form action="../php/crear_usuario.php" method="POST">
            <section class="form-register">
                <h4>Formulario Registro</h4>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
                <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
                <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña">
                <input class="controls" type="password" name="contrasena2" id="contrasena2" placeholder="Verifique su Contraseña">
                <input class="botons" type="submit" value="Registrar">
                <?php
                    session_start();

                    if (isset($_SESSION["contrasena_invalida"])){
                        echo '<p style="color: red;">'.$_SESSION["contrasena_invalida"].'</p>';
                    }

                    unset($_SESSION["contrasena_invalida"]);
                ?>
                <p><a href="./inicio.php">¿Ya tengo Cuenta?</a></p>
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
            <a href="../index.php">Comienza Ahora</a>
        
        </button>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Laura_Juan</p>
        </div>
    </footer>
  
</body>
</html>