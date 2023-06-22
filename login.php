<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spotify_finalp";
error_reporting(0);

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
            <a href="index.php">Inicio</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#galerias">Galeria</a>
            <a href="#planes">Nuestros Planes</a>
            <a href="login.php">Inicio de Sesión</a>
            <a href="registro.php">Registro</a>
            <a href="planes.php">Suscribirse</a>
        </div>
    </header>
    
    
    <!-- FORMULARIO INICIO SESION -->

    <section class="contact-section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1 class="form-title">Inicia sesion</h1>
        <h3 class="form-subtitle">Ingresa tu usuario y contraseña correctamente</h3>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button name="submit" type="submit" class="submit-button">Enviar</button>
        </form>
    </section>
    <?php
    $submit = $_POST['submit'];
    if(isset($submit)){
        // Obtener los datos enviados por el formulario
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
        $result = $conn->query($query);
        
        //CONDICION PARA ACCESO DEL ADMINISTRADOR DE LA PAGINA
        if($usuario== "emiliano231" && $contrasena="admin"){
             // Iniciar la sesión
             session_start();
            
             // Almacenar el usuario en la sesión
             $_SESSION['usuario'] = $usuario;
            header('Location: admin_panel.php');
            exit();
        }

        // Verificar el resultado de la consulta
        if ($result->num_rows > 0) {
            // Iniciar la sesión
            session_start();
            
            // Almacenar el usuario en la sesión
            $_SESSION['usuario'] = $usuario;
            
            // Redirigir al usuario a la página de perfil
            header('Location: usuario_perfil.php');
            exit();
        } else {
            // Usuario inválido, mostrar un alert y redirigir al index.php
            echo '<script>alert("Los datos son incorrectos");</script>';
            
            exit();
        }
       
        // Cerrar la conexión a la base de datos
        $conn->close();
      }
    ?>
    <section id="comentarios-section">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Publica un comentario iniciando sesion!!</h2>
        <div class="buttons">
            <a href="login.php">Inicio de Sesión</a>
            <a href="registro.php">Registro</a>
        </div>
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