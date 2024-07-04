<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Librería_Sisiescontigo</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="https://img.freepik.com/vector-gratis/pila-libros-diseno-plano-dibujado-mano_23-2149334862.jpg?w=740&t=st=1720045562~exp=1720046162~hmac=c98e6f4bb3daf7e3e46c115a014c5d5edfc42a94526094c83b118cec285e0e4e">
</head>
<body>
    <header>
        <div class="container">
        <p class="logo"><a href="../index.php">Librería_Sisiescontigo</a></p>
            <nav>
                <a href="#Todos-a-leer">Inicio</a>
                <a href="./paginas/catalogo.php">Catálogo</a>
                <a href="#como-contactarnos">Como Contactarnos </a>
                <?php

                    if (isset($_SESSION["usuario"])){
                        echo '<a href="../php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="../paginas/inicio.php">Iniciar Sesion</a>';
                    }
                ?>
            </nav>
        </div>
    </header>

    <section id="hero">
        <h1>"Nunca es demasiado tarde para ser sabio".<br>Robinson Crusoe, de Daniel Defoe.</h1>
    </section>

    <section id="Todos-a-leer">
        <div class="container">
            <div class="img-container"></div>
            <div class="texto">

                <h2>Todos a <span class="color-acento">Leer!</span></h2>
                <p>Con la ayuda de nuestra plataforma, podrás encontrar ese libro que tanto buscas o deshacerte de aquellos que ya no necesitas. ¡No esperes más y únete a nuestra comunidad de amantes de la lectura en Si, si es contigo! juntos podemos hacer que la magia de los libros llegue a más personas. ¡Compra, vende y comparte tus libros con nosotros!
                    
            </div>
        </div>
    </section>

    <section id="recomendaciones">
        <div class="container">
            <h2>Recomendaciones</h2>
            <div class="programas">
                <div class="carta">
                    <h3>Juvenil</h3>
                    <br>
                    <p>¿Te gusta el misterio, la fantasía y el romance? Aquí encontrarás una amplia variedad de libros para adolescentes que harán volar tu imaginación, además de libros juveniles de no ficción para estar al tanto de los temas más actuales.</p>
                    <button>
                        <a href="./paginas/catalogo.php?buscar=juvenil">+ Info</a>
                    </button>
                </div>
                <div class="carta">
                    <h3>Para Peques</h3>
                    <br>
                    <p>Los mejores libros para los más pequeños. Aprende y diviértete con la literatura clasica...Ademas encontrarás cuentos, libros con actividades, para colorear, con pegatinas, sonidos, texturas ¡y mucho más!</p>
                    <button>
                        <a href="./paginas/catalogo.php?buscar=peques">+ Info</a>
                    </button>
                </div>
                <div class="carta">
                    <h3>Clasicos</h3>
                    <BR></BR>
                    <p>«En un lugar de la Mancha, de cuyo nombre no quiero acordarme…»
                        Es difícil no reconocer esta frase, ¿verdad? Seas o no lector, hay algunos libros indispensables que nunca fallan a la hora de encontrar un buen regalo: los grandes clásicos de la literatura. Su impronta ha quedado marcada tanto en la gran pantalla como en miles de referencias en cómics, series y otras narrativas.</p>
                    <button>
                        <a href="./paginas/catalogo.php?buscar=clasicos">+ Info</a>
                    </button>
                </div>  
            </div>
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
            <a href="#">Comienza Ahora</a>
            
        </button>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Laura_Sebastian</p>
        </div>
    </footer>
  
</body>
</html>
