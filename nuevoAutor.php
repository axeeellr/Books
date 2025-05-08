<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $nacionalidad = $_POST["nacionalidad"];

    // Manejo de la imagen
    $directorio = "imagenesAutores/";
    $archivoImagen = $directorio . basename($_FILES["portada"]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivoImagen, PATHINFO_EXTENSION));

    // Validar tipo de imagen (solo JPG, PNG, GIF)
    if ($tipoArchivo != "jpg" && $tipoArchivo != "png" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif") {
        echo "Error: Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        exit();
    }

    // Mover imagen a la carpeta
    if (move_uploaded_file($_FILES["portada"]["tmp_name"], $archivoImagen)){
        $sql = "INSERT INTO autor (nombre, nacionalidad, imagen) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $nacionalidad, $archivoImagen]);

        echo "Autor registrado correctamente. <a href='autores.php'>Ver autores</a>";
    }
    else {
        echo "Error al subir la imagen.";
    }
}
?>