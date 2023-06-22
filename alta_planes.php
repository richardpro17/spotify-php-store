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
             <a href="admin_panel.php">Inicio</a>
            <a href="logout.php">Cerrar sesion</a>
            <a href="gestion_tablas.php">Control Tablas</a>
            <a href="alta_planes.php">Codigos Activacion</a>
            <h2>Bienvenido ADMIN: <?php echo $usuario;?></h2>
            
            
        </div>
    </header>
    

    <form method="POST" action="">
    <h1>ALTA DE PLANES</h1>
    <div>
        <label  class="green-label" for="nombre_plan">Selecciona un plan:</label>
        <select name="nombre_plan" required>
        <option value="plan basico">Plan Básico</option>
        <option value="plan familiar">Plan Familiar</option>
        <option value="plan premium">Plan Premium</option>
        </select>
    </div>
    
    <div>
        <label class="green-label" for="codigo">Código:</label>
        <input type="text" name="codigo" pattern="\d{8}" maxlength="8" required>
        <small>Solo se permiten 8 dígitos numéricos</small>
    </div>
    
    <button name="submit" type="submit">Guardar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $nombre_plan = $_POST['nombre_plan'];
    $codigo = $_POST['codigo'];

    // Verificar el nombre del plan y asignar los valores correspondientes
    $precio = 0;
    $duracion = 0;

    if ($nombre_plan === 'plan basico') {
        $precio = 115;
        $duracion = 15;
    } elseif ($nombre_plan === 'plan familiar') {
        $precio = 190.99;
        $duracion = 60;
    } elseif ($nombre_plan === 'plan premium') {
        $precio = 149.99;
        $duracion = 30;
    }

    // Insertar los datos en la tabla "planes"
    // Asumiendo que tienes una conexión a la base de datos establecida previamente
    $query = "INSERT INTO planes (nombre_plan, precio, codigo, duracion) VALUES ('$nombre_plan', $precio, '$codigo', $duracion)";
    // Ejecutar la consulta y verificar si fue exitosa
    if (mysqli_query($conn, $query)) {
        // Redireccionar a la página de gestión de tablas
        header("Location: gestion_tablas.php");
        exit;
    } else {
        // Mostrar un mensaje de error si la inserción falló
        echo "Error al insertar los datos: " . mysqli_error($conn);
    }
    }
    ?>

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