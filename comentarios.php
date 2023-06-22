<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spotify_finalp";
//error_reporting(0);
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

        <?php


    // Obtener el ID de usuario actual
    $usuarioActual = $usuario;
    $queryUsuario = "SELECT id_usuario FROM usuarios WHERE usuario = '$usuarioActual'";
    $resultUsuario = mysqli_query($conn, $queryUsuario);
    $rowUsuario = mysqli_fetch_assoc($resultUsuario);
    $idUsuarioActual = $rowUsuario['id_usuario'];

    // Consulta para obtener los comentarios del usuario actual
    $queryComentarios = "SELECT * FROM comentarios WHERE comentario_usuario = $idUsuarioActual";
    $resultComentarios = mysqli_query($conn, $queryComentarios);

    // Comprobar si se ha enviado la solicitud de eliminar un comentario
    if (isset($_POST['eliminarcc'])) {
        $idComentario = $_POST['eliminarcc'];

        // Eliminar el comentario
        $queryEliminar = "DELETE FROM comentarios WHERE id_comentario = $idComentario";
        mysqli_query($conn, $queryEliminar);
        header('Location: comentarios.php');
        exit();
    }
    ?>


        <h1>Mis Comentarios</h1>

        <table>
            <tr>
                <th>Fecha</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>

            <?php while ($rowComentario = mysqli_fetch_assoc($resultComentarios)) { ?>
                <tr>
                    <td><?php echo $rowComentario['fecha']; ?></td>
                    <td><?php echo $rowComentario['cuerpo_comentario']; ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="eliminarcc" value="<?php echo $rowComentario['id_comentario']; ?>">
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>



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