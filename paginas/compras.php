<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/compras.css">
    <link rel="stylesheet" type="text/css" href="../css/catalogo.css">
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
                    if (isset($_SESSION["usuario"])){
                        echo '
                        <a href="../paginas/vender.php">Vender</a>
                        <a href="#">Mis Compras</a>                            
                        <a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="../paginas/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
        </div>
        
    </header>

</head>
<body>

    <div class="container">
            <h2>Mis compras</h2>
            <div class="columnas">
                <div class="titulo"><b>Nombre del Libro</b></div>
                <div class="titulo"><b>Descripción</b></div>
                <div class="titulo"><b>Estado de la compra</b></div>
                <div class="titulo"><b>Unidades Compradas</b></div>
                <div class="titulo"><b>Fecha de la compra</b></div>
            </div>
            <hr>
            <div class="columnas">
                <?php 
                    if (isset($_SESSION["compras"])){
                        foreach ($_SESSION["compras"] as $compras => $compra) {
                            echo '
                            <div class="columna">'.$compra["nombre"].'</div>
                            <div class="columna">'.$compra["precio"].'</div>
                            <div class="columna">'.$compra["estado"].'</div>
                            <div class="columna">'.$compra["cantidad"].'</div>
                            <div class="columna">'.$compra["creacion"].'</div>
                        ';
                        }
                    }
                ?>
            </div>
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
</body>
</html>