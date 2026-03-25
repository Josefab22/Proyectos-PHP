<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUMERACIÓN</title>
    <link rel="stylesheet" href="style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <h1>NUMERACIÓN</h1>
    <p>En este ejercicio se muestra la numeración del 1 al 10 utilizando un bucle for en PHP.</p>

    <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<p>" . $i . "<br>";
        }
        echo "<h2>¡Numeración completa!</h2>";
    ?>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae illum error natus veniam dolore possimus odit aspernatur ipsam esse perferendis! Necessitatibus sint veritatis reprehenderit dolores expedita molestias rem labore sequi? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis ullam accusantium reiciendis ducimus commodi. Voluptatum enim, aperiam odit asperiores quis laborum excepturi pariatur ullam deleniti. Pariatur id impedit amet dolor? Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima ad nobis id animi recusandae doloremque odit, unde provident similique nam earum esse, ipsa velit, nostrum at pariatur amet exercitationem. Nostrum!</p>
    <br>
    <img src="https://previews.123rf.com/images/annatigra/annatigra1604/annatigra160400075/54837131-vector-illustration-of-numeral-seamless-pattern-for-design-website-background-banner-numbers.jpg" alt="numeración">
    <footer>
        <div class="footer-content">
            <div class="col-redes">
            <p >Siguenos en nuestas redes sociales</p>
                <a href="" target="_blank" class="facebook-btn">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" target="_blank" class="instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
            </div>
            <div class="col-ubicacion">
                <p >Ubícanos en:</p>
                    <a href="" target="_blank" class="ubicacion">
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                <br>
            </div>
            <p >© 2026 Ejercicio de Numeración</p>
            <p >Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>