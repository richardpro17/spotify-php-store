<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spotify_finalp";
error_reporting(0);
// Iniciar la sesión
session_start();

// Obtener el usuario de la sesión
$usuario = $_SESSION['usuario'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Spotify: Plataforma de Musica y Mas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <!-- HEADER PRINCIPAL -->
    <header>
        <div class="logo">
            <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png" alt="Logo">
        </div>
        <div class="buttons">
            <a href="usuario_perfil.php">Inicio</a>
            <a href="logout.php">Cerrar sesion</a>
            <a href="suscripciones.php">Suscripciones</a>
            <a href="comentarios.php">Comentarios</a>
            <a href="gestion_usario.php">Gestionar Perfil</a>
            <h2>Bienvenido: <?php echo $usuario;?></h2>
            
        </div>
    </header>
    <!-- MENU DE NAVEGACION LATERAL -->
    <section class="content-section">
        <div class="container">
            <h1 id="wh1">Obten tu plan Premium!!!!</h1>
            <p id="pw1">Obten ya tu plan premium para empezar a disfrutar de tus artistas favoritos con playlists únicas para ti.</p>
            <a href="#planes" class="btn">Ver Plan</a>
        </div>
    </section>
    
    <!-- SECTION CON ARTICULOS SOBRE LA PAGINA -->
    <section id="nosotros"class="articles-section">
        <h2 class="section-title">Conoce un poco de nosotros</h2>
        
        <div class="article-row">
            <div class="article">
                <h1 id="titulo1">Historia de Spotify</h1>
                <p id="parrafo1">Spotify es una plataforma de música en streaming fundada en 2006 en Estocolmo, Suecia. Desde entonces,
                     se ha convertido en una de las principales opciones para escuchar música en línea, con más de 365 millones de usuarios
                      activos en más de 170 países en 2021.</p>
            </div>
            <div class="article">
                <h1 id="titulo2">Servicios de Spotify</h1>
                <p id="parrafo2">
                *. Reproducción de música en streaming sin publicidad<br>*. Reproducción de podcasts<br>*. Creación y edición de listas de reproducción personalizadas<br>*. Recomendaciones personalizadas según los gustos del usuario
                </p>
            </div>
        </div>
        <div class="article-row">
            <div class="article">
                <h1 id="titulo3">Popularidad de Spotify</h1>
                <p id="parrafo3">Spotify se ha convertido en una plataforma de música en streaming muy popular en todo el mundo, con una gran 
                    cantidad de usuarios activos. En 2021, se informó que la plataforma tenía más de 365 millones de usuarios activos, de los cuales
                     165 millones eran usuarios de pago. Spotify también es muy popular entre los artistas, ya que les permite compartir su música y
                      llegar a una audiencia global.</p>
            </div>
            <div class="article">
                <h1 id="titulo4">Competencia??</h1>
                <p id="parrafo4">Spotify tiene varios competidores en la industria de la música en streaming, entre los que se incluyen:
                    *. Apple Music<br>*. Amazon Music<br>*. Youtube Music<br>*. Tidal<br>*. Deezer
                </p>
            </div>
        </div>
    </section>
    <!-- CARRUSEL DE IMAGENES ALUSIVAS A LA PAGINA -->
    <section id="galerias" class="image-carousel">
        <h2 class="carousel-title">Nuestra galería</h2>
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="https://wwwhatsnew.com/wp-content/uploads/2020/12/Lo-mas-escuchado-en-YouTube-en.jpg" alt="Imagen 6" />
                <div class="image-caption">Los mas escuchados spotify</div>
            </div>
            <div class="carousel-slide">
                <img src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2023/03/nuevo-diseno-spotify-2977742.jpg?tf=3840x" alt="Imagen 1" />
                <div class="image-caption">Nuevo estilo de interfaces</div>
            </div>
            <div class="carousel-slide">
                <img src="https://phantom-elmundo.unidadeditorial.es/3e8fc90d30252f934d2bc573c5d8c49f/resize/1200/f/jpg/assets/multimedia/imagenes/2021/03/30/16170855735804.jpg" alt="Imagen 2" />
                <div class="image-caption">ceo de spotify 2023</div>
            </div>
            <div class="carousel-slide">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCYQOHagtOr6PW0RyzHUO3xlauUbyq-NZSNA&usqp=CAU" alt="Imagen 3" />
                <div class="image-caption">Conectividad para ti en todo momento</div>
            </div>
            <div class="carousel-slide">
                <img src="https://cnnespanol.cnn.com/wp-content/uploads/2022/03/CNN-Barcelona-Spotify.jpg?quality=100&strip=info" alt="Imagen 4" />
                <div class="image-caption">Patrocinio a nuevo equipo de fut profesional</div>
            </div>
            <div class="carousel-slide">
                <img src="https://www.trecebits.com/wp-content/uploads/2022/07/Logotipo-Spotify.webp" alt="Imagen 5" />
                <div class="image-caption">Renovando nuestro diseño para ti</div>
            </div>
            <div class="carousel-slide">
                <img src="https://www.lavanguardia.com/andro4all/hero/2022/11/Spotify-Wrapped-2022.jpg?width=1200" alt="Imagen 6" />
                <div class="image-caption">Descubre tus artistas favoritos</div>
            </div>
            
        </div>

        <!-- Botones de navegación del carrusel -->
        <button id="prevButton">Anterior</button>
        <button id="nextButton">Siguiente</button>
    </section>
    
    <!-- SECTION CON PLANES PREMIUM -->
    <section id="planes" class="pricing-section">
        <article class="pricing-article">
            <h1>Plan Básico</h1>
            <h2>$115.00/mes</h2>
            <ul>
            <li>Acceso ilimitado a música</li>
            <li>Sin anuncios</li>
            <li>Calidad de audio estándar</li>
            <li>Reproducción en un solo dispositivo</li>
            </ul>
            <a href="planes.php" class="buy-button">Comprar Plan</a>
        </article>
        <article class="pricing-article">
            <h1>Plan Premium</h1>
            <h2>$149.99/mes</h2>
            <ul>
            <li>Acceso ilimitado a música</li>
            <li>Sin anuncios</li>
            <li>Calidad de audio mejorada</li>
            <li>Reproducción en varios dispositivos</li>
            <li>Modo sin conexión</li>
            </ul>
            <a href="planes.php" class="buy-button">Comprar Plan</a>
        </article>
        <article class="pricing-article">
            <h1>Plan Familiar</h1>
            <h2>$190.99/mes</h2>
            <ul>
            <li>Acceso ilimitado a música</li>
            <li>Sin anuncios</li>
            <li>Calidad de audio mejorada</li>
            <li>Reproducción en varios dispositivos</li>
            <li>Modo sin conexión</li>
            <li>Hasta 6 cuentas</li>
            </ul>
            <a href="planes.php" class="buy-button">Comprar Plan</a>
        </article>
    </section>

    <section class="contact-section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1 class="form-title">Alguna duda....</h1>
        <h3 class="form-subtitle">Escríbenos y te responderemos</h3>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <textarea name="mensaje" placeholder="Mensaje" required></textarea>
            <button name="submit" type="submit" class="submit-button">Enviar</button>
        </form>
    </section>
    <?php
    $submit = $_POST['submit'];
    if(isset($submit)){
        // Obtener los valores enviados por el formulario
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];
      
        // Insertar los datos en la tabla "sugerencias_tabla"
        $sql = "INSERT INTO sugerencias_tabla (email, nombre, mensaje) VALUES ('$email', '$nombre', '$mensaje')";
      
        if ($conn->query($sql) === TRUE) {
          echo "<script type=\"text/javascript\">alert('Formulario enviando correctamente'); </script>"; 
        } else {
            echo "<script type=\"text/javascript\">alert('Formulario enviando correctamente'); </script>"  . $conn->error;
        }
      
        // Cerrar la conexión a la base de datos
        $conn->close();
      }
    ?>
    <section id="comentarios-section">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Publica un comentario <?php echo $usuario; ?></h2>
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
        <label for="cuerpo_comentario">Cuerpo del Comentario:</label>
        <textarea name="cuerpo_comentario" id="cuerpo_comentario" required></textarea>
        <label for="estrellas">Calificación:</label>
        <input type="number" name="estrellas" id="estrellas" min="1" max="5" required>
        <button name="publicar" type="submit" class="submit-button">Publicar</button>
    </form>
    <?php
    $publicar= $_POST['publicar'];
    if(isset($publicar)){
        $usuario = $_POST['usuario'];
        $fecha = $_POST['fecha'];
        $cuerpo_comentario = $_POST['cuerpo_comentario'];
        $estrellas = $_POST['estrellas'];
        // Aquí puedes ejecutar una consulta SQL para obtener el ID del usuario en base al nombre de usuario
        $sql_comment = "SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'";
        // Ejecutar la consulta
        $resultado = mysqli_query($conn, $sql_comment);

        // Verificar si se encontró el usuario y obtener su ID
        if ($fila = mysqli_fetch_assoc($resultado)) {
        $id_usuario = $fila['id_usuario'];

        // Aquí puedes ejecutar la instrucción SQL para insertar el comentario en la tabla correspondiente
        $sql_insert = "INSERT INTO comentarios (comentario_usuario, fecha, cuerpo_comentario, estrellas) VALUES ('$id_usuario', '$fecha', '$cuerpo_comentario', '$estrellas')";

        // Ejecutar la consulta y verificar si fue exitosa
        if (mysqli_query($conn, $sql_insert)) {
            echo "<script>alert('Comentario agregado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al agregar el comentario');</script>";
        }
        } else {
        echo "<script>alert('Usuario no encontrado');</script>";
        }

        // Redireccionar a la página principal o a donde desees
       
    }
    
    

    ?>
        <h1>Comentarios</h1>
        

        <?php
        // Consulta para obtener todos los comentarios de la tabla "comentarios"
        $query_cc = "SELECT * FROM comentarios";
        $result_cc = mysqli_query($conn, $query_cc);

        // Iterar a través de los resultados y mostrar los comentarios
        while ($rowcc = mysqli_fetch_assoc($result_cc)) {
            
            // Obtener el resto de la información del comentario
            $comentario_usuario= $rowcc['comentario_usuario'];
            $id_comentario = $rowcc['id_comentario'];
            $fecha = $rowcc['fecha'];
            $cuerpoComentario = $rowcc['cuerpo_comentario'];
            $estrellas = $rowcc['estrellas'];

            // Generar el HTML para mostrar las estrellas según la calificación
            $estrellasHtml = '';
            for ($i = 1; $i <= $estrellas; $i++) {
                $estrellasHtml .= '⭐';
            }


            ?>

            <!-- Estructura del div de ejemplo para mostrar un comentario -->
            <div class="comentario">
                <div class="usuario"><?php //Se obtiene el usuario de quien publico el comentario
                $queryUsuario = "SELECT usuario FROM usuarios WHERE id_usuario = $comentario_usuario";
                $resultUsuario = mysqli_query($conn, $queryUsuario);
                $rowUsuario = mysqli_fetch_assoc($resultUsuario);
                $usuario = $rowUsuario['usuario'];
                echo $usuario; 
                
                ?>
                </div>
                <div class="fecha"><?php echo $fecha; ?></div>
                <div class="cuerpo"><?php echo $cuerpoComentario; ?></div>
                <div class="estrellas"><?php echo $estrellasHtml; ?> estrellas</div>
            </div>

            <?php
        }
        ?>
    <!-- Agrega más comentarios aquí -->
    </section>

    <footer>
    <div class="derechos-autor">© Omar Emiliano Martinez Cortes</div>
    <div class="redes-sociales">
        <!-- Agrega aquí las redes sociales de Spotify -->
        <a href="https://open.spotify.com/__noul__?pfhp=2c2ccb58-8a92-4713-a1c0-8b43b3090b49"><img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_RGB_White.png" alt="Logo"></a>
    </div>
    </footer>


    <script>
    // JavaScript para el carrusel de imágenes
    var slides = document.querySelectorAll('.carousel-slide');
    var currentSlide = 0;

    function showSlide() {
      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
      }
      slides[currentSlide].style.display = 'block';
    }

    function nextSlide() {
      currentSlide++;
      if (currentSlide >= slides.length) {
        currentSlide = 0;
      }
      showSlide();
    }

    function prevSlide() {
      currentSlide--;
      if (currentSlide < 0) {
        currentSlide = slides.length - 1;
      }
      showSlide();
    }

    showSlide();

    document.getElementById('prevButton').addEventListener('click', prevSlide);
    document.getElementById('nextButton').addEventListener('click', nextSlide);
  </script>
    </body>
</html>