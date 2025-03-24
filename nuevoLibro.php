<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $categoria = $_POST["categoria"];
    $fechaCompra = $_POST["fechaCompra"];

    // Manejo de la imagen
    $directorio = "imagenesLibros/";
    $archivoImagen = $directorio . basename($_FILES["portada"]["name"]);
    $tipoArchivo = strtolower(pathinfo($archivoImagen, PATHINFO_EXTENSION));

    // Validar tipo de imagen (solo JPG, PNG, GIF)
    if ($tipoArchivo != "jpg" && $tipoArchivo != "png" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif") {
        echo "Error: Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        exit();
    }

    // Mover imagen a la carpeta
    if (move_uploaded_file($_FILES["portada"]["tmp_name"], $archivoImagen)){
        $sql = "INSERT INTO libros (titulo, autor, categoria, fecha_compra, imagen) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$titulo, $autor, $categoria, $fechaCompra, $archivoImagen]);

        echo "Libro registrado correctamente. <a href='libros.php'>Ver libros</a>";
    }
    else {
        echo "Error al subir la imagen.";
    }
}
?>