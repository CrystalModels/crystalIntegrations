<?php



function conn() {
    $hostname = "212.1.211.1"; // o dirección IP del servidor de la base de datos remota
    $usuariodb = "u495616274_dev_crystalint"; // reemplazar con el usuario de la base de datos
    $passworddb = "e8:WTU8jAzY1"; // reemplazar con la contraseña de la base de datos
    $dbname = "u495616274_dev_crystalint"; // reemplazar con el nombre de la base de datos

    try {
        // Conexión a la base de datos
        $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);

        // Establecer el conjunto de caracteres de la conexión
        if (!mysqli_set_charset($conectar, "utf8mb4")) {
            throw new Exception("Error al establecer el conjunto de caracteres: " . mysqli_error($conectar));
        }

        return $conectar;
    } catch (Exception $e) {
        // Manejo del error
        echo "Error al conectar con la base de datos: " . $e->getMessage();
        exit();
    }
}


?>