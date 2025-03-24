<?php
require 'conexion.php';

$sql = "SELECT categoria, COUNT(*) AS total_libros FROM libros GROUP BY categoria";

$stmt = $conn->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="categories__items">
        <?php foreach ($categorias as $cat): ?>
            <div class="category">
                <div class="category__info">
                    <h3><?= htmlspecialchars($cat['categoria']); ?></h3>
                    <p>Libros: <?= $cat['total_libros']; ?></p>
                </div>
                <div class="category__books">
                    <img src="img/book.png" alt="">
                    <img src="img/book.png" alt="">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>