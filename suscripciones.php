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


        <h1>Codigos de activacion: <?php echo $usuario?></h1>
        <?php
            // Realizar la consulta en la tabla "control_planes"
            $query_ccplan = "SELECT * FROM control_planes WHERE plan_usuario = '$usuario'";
            $result_ccplan = mysqli_query($conn, $query_ccplan);

            // Verificar si hay registros encontrados
            if (mysqli_num_rows($result_ccplan) > 0) {
                // Mostrar los resultados en una tabla
                echo '<table  class="spotify-table">';
                echo '<tr><th>ID Control Plan</th><th>Usuario</th><th>Código Plan</th><th>Acciones</th></tr>';

                while ($row = mysqli_fetch_assoc($result_ccplan)) {
                    $idControlPlan = $row['id_cplan'];
                    $codigoPlan = $row['plan_codigo'];

                    echo '<tr>';
                    echo '<td>' . $idControlPlan . '</td>';
                    echo '<td>' . $usuario . '</td>';
                    echo '<td>' . $codigoPlan . '</td>';
                    echo '<td><button class="spotify-button" onclick="copyCode(\'' . $row["plan_codigo"] . '\')">Copiar</button></td>';
                     echo '<td><a class="spotify-link" target="_blank"href="https://accounts.spotify.com/es-ES/login?continue=https%3A%2F%2Fwww.spotify.com%2Fmx%2Fredeem%2F">Canjear</a></td>';
                    echo '<td>';
                    echo '<form method="post">';
                    echo '<input type="hidden" class="delete-button" name="idControlPlan" value="' . $idControlPlan . '">';
                    echo '<input type="submit" name="eliminar" value="Eliminar">';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';

                    // Procesar el formulario de eliminación
                    if (isset($_POST['eliminar']) && $_POST['idControlPlan'] == $idControlPlan) {
                        // Obtener el ID del control plan a eliminar
                        $idControlPlanEliminar = $_POST['idControlPlan'];

                        // Crear la instrucción SQL para eliminar el plan
                        $queryEliminar = "DELETE FROM control_planes WHERE id_cplan = '$idControlPlanEliminar'";
                        mysqli_query($conn, $queryEliminar);

                        // Redireccionar a la misma página
                        header("Location: suscripciones.php");
                        exit;
                    }
                }

                echo '</table>';
            } else {
                echo 'No se encontraron registros.';
            }

            // Liberar los resultados de la consulta
            mysqli_free_result($result_ccplan);
        ?>



    <footer>
    <div class="derechos-autor">© Omar Emiliano Martinez Cortes</div>
    <div class="redes-sociales">
        <!-- Agrega aquí las redes sociales de Spotify -->
        <a href="https://open.spotify.com/__noul__?pfhp=2c2ccb58-8a92-4713-a1c0-8b43b3090b49"><img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_RGB_White.png" alt="Logo"></a>
    </div>
    </footer>
    <script>
        // Función para copiar el código al portapapeles
        function copyCode(code) {
            navigator.clipboard.writeText(code).then(function() {
                alert("Código copiado al portapapeles: " + code);
            }, function() {
                alert("No se pudo copiar el código.");
            });
        }
    </script>

    </body>
</html>