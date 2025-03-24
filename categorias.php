<?php
require 'conexion.php';

$sql = "SELECT titulo, autor, categoria, fecha_compra, imagen FROM libros ORDER BY categoria, titulo";

$stmt = $conn->prepare($sql);
$stmt->execute();
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Agrupar los libros por categoría
$categorias = [];
foreach ($libros as $libro) {
    $categorias[$libro['categoria']][] = $libro;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/categorias.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61fb4717c0.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/book.png">
    <title>Luz de Letras | Categorías</title>
</head>
<body>
    <header>
        <img src="img/book.png" alt="Libro">
        <div class="header__title">
            <h1>Luz De Letras</h1>
            <p>Organiza, descubre y disfruta</p>
        </div>
    </header>
    <div class="categories__container">
        <h2>Categorías de Libros</h2>
        <a href="index.php">Volver a inicio</a>
        <?php foreach ($categorias as $categoria => $librosCategoria): ?>
        <h3>Categoría:<?= htmlspecialchars($categoria); ?></h3>
        <div class="categories__items">
        <?php foreach ($librosCategoria as $libro): ?>
            <div class="category">
                <div class="category__info">
                    <h3><?= htmlspecialchars($libro['titulo']); ?></h3>
                    <p><?= htmlspecialchars($libro['autor']); ?></p>
                    <p><?= htmlspecialchars($libro["fecha_compra"]) ?></p>
                </div>
                <div class="category__books">
                    <img src="<?= $libro["imagen"] ?>" alt="">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>