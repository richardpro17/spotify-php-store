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
    <?php
    // Obtener el nombre de las tablas a mostrar
    $tablas = [
        "usuarios" => ["id_usuario","usuario", "nombre", "apellido", "correo", "contrasena"],
        "sugerencias_tabla" => ["id_queja","email", "nombre", "mensaje"],
        "planes" => ["id_plan","nombre_plan", "precio", "codigo", "duracion"],
        "control_planes" => ["id_cplan","plan_usuario", "plan_codigo"],
        "comentarios" => ["id_comentario", "comentario_usuario", "fecha", "cuerpo_comentario", "estrellas"]
    ];

    // Procesar el formulario solo si se ha enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener la tabla seleccionada del formulario
        $tablaSeleccionada = $_POST["tabla"];

        // Verificar si la tabla seleccionada existe en el arreglo $tablas
        if (array_key_exists($tablaSeleccionada, $tablas)) {
            // Obtener los nombres de columna de la tabla seleccionada
            $columnas = $tablas[$tablaSeleccionada];

            // Consultar la tabla seleccionada
            $sql = "SELECT " . implode(", ", $columnas) . " FROM $tablaSeleccionada";
            $result = $conn->query($sql);

            // Mostrar los registros en una tabla con estilos de Spotify
            echo "<table class='spotify-table'>";
            echo "<tr>";

            // Mostrar encabezados de columna
            foreach ($columnas as $columna) {
                echo "<th>$columna</th>";
            }

            echo "</tr>";

            // Mostrar los registros de la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                // Mostrar los valores de cada columna
                foreach ($columnas as $columna) {
                    echo "<td>{$row[$columna]}</td>";
                }
                // Mostrar el botón de eliminación
                echo "<td><form method='POST' action=''>";
                echo "<input type='hidden' name='tabla' value='$tablaSeleccionada'>";
                echo "<input type='hidden' name='row' value='{$row[$columnas[0]]}'>";
                echo "<input  class='delete-button' name='delete'type='submit' value='Eliminar'>";
                echo "</form></td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Tabla no encontrada.";
        }
        // Procesar la eliminación de la fila
        if (isset($_POST['delete'])) {
            $tabla = $_POST['tabla'];
            $row = $_POST['row'];

            // Consultar si la fila existe en la tabla
            $sql = "SELECT * FROM $tabla WHERE {$tablas[$tabla][0]} = '$row'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Eliminar la fila
                $sql = "DELETE FROM $tabla WHERE {$tablas[$tabla][0]} = '$row'";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('La fila se eliminó correctamente.');</script>";
                } else {
                    echo "<script>alert('Error al eliminar la fila.');</script>";
                }
            } else {
                echo "<script>alert('La fila no existe en la tabla seleccionada.');</script>";
            }
        }
    }

    // Crear el formulario para seleccionar la tabla
    echo "<form method='POST' action=''>";
    echo "<label  class='green-label' for='tabla'>Selecciona una tabla:</label>";
    echo "<select name='tabla' id='tabla'>";
    echo "<option value='usuarios'>Usuarios</option>";
    echo "<option value='comentarios'>Comentarios</option>";
    echo "<option value='sugerencias_tabla'>Sugerencias</option>";
    echo "<option value='planes'>Planes</option>";
    echo "<option value='control_planes'>Control Planes</option>";
    echo "</select>";
    echo "<input type='submit' value='Mostrar'>";
    echo "</form>";

    // Cerrar la conexión a la base de datos
  
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