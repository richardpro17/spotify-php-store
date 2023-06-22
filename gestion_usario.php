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
    
    
    <!-- FORMULARIO GESTIONAR PERFIL PARA MODIFICAR O ELEIMINAR USUARIO PROPIO -->
    <?php
      $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
      $result = $conn->query($sql);
      
      // Verificar si se encontraron resultados
      if ($result->num_rows > 0) {
          // Obtener los datos del usuario
          $row = $result->fetch_assoc();
          $nombre = $row['nombre'];
          $apellido = $row['apellido'];
          $correo = $row['correo'];
          $contrasena = $row['contrasena'];
      } else {
          echo "No se encontraron datos para el perfil.";
          exit();
      }  
    ?>

    <section class="contact-section">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1 class="form-title">Gestiona tu perfil "<?php echo $usuario?>"</h1>
        <h3 class="form-subtitle">edita o elimina la informacion de tu perfil.</h3>
        
        <label class="form-subtitle" for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>

        <label class="form-subtitle" for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $apellido; ?>"><br>

        <label class="form-subtitle" for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $correo; ?>"><br>

        <label class="form-subtitle" for="contrasena">Contraseña:</label>
        <input type="text" name="contrasena" value="<?php echo $contrasena; ?>"><br>
            
            <button name="editar" type="submit" class="submit-button">Editar</button>
            <button name="eliminar" type="submit" class="delete-button">Eliminar perfil</button>
        </form>
    </section>
    
    <?php
        if (isset($_POST['editar'])) {
            $nuevoNombre = $_POST['nombre'];
            $nuevoApellido = $_POST['apellido'];
            $nuevoCorreo = $_POST['correo'];
            $nuevaContrasena = $_POST['contrasena'];
        
            // Consulta para actualizar los datos del perfil
            $sqlActualizar = "UPDATE usuarios SET nombre = '$nuevoNombre', apellido = '$nuevoApellido', correo = '$nuevoCorreo', contrasena = '$nuevaContrasena' WHERE usuario = '$usuario'";
            if ($conn->query($sqlActualizar) === TRUE) {
                echo "Los datos del perfil han sido actualizados exitosamente.";
                // Redirigir a otra página si es necesario
                header('Location: usuario_perfil.php');
            } else {
                echo "Error al actualizar los datos del perfil: " . $conn->error;
            }
        }
        
        // Eliminar el perfil
        if (isset($_POST['eliminar'])) {
            // Consulta para eliminar el perfil y sus datos relacionados
            $sqlEliminar = "DELETE FROM usuarios WHERE usuario = '$usuario'";
            if ($conn->query($sqlEliminar) === TRUE) {
                echo "El perfil ha sido eliminado exitosamente.";
                // Redirigir a logout.php
                header('Location: logout.php');
            } else {
                echo "Error al eliminar el perfil: " . $conn->error;
            }
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