<?php
require 'conexion.php';

$sql = "SELECT * FROM librosdeseos";
$stmt = $conn->query($sql);
$librosDeseados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/libros.css">
    <link rel="stylesheet" href="css/deseos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61fb4717c0.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/book.png">
    <title>Luz de Letras | Mis Libros</title>
</head>
<body>
    <header>
        <img src="img/book.png" alt="Libro">
        <div class="header__title">
            <h1>Luz De Letras</h1>
            <p>Organiza, descubre y disfruta</p>
        </div>
    </header>
    <div class="books__container">
        <h2>Mis Libros Deseados</h2>
        <a href="index.php">Volver a inicio</a>
        <div class="books">
            <?php foreach ($librosDeseados as $libro): ?>
            <div class="book" onclick="window.location='libro.html'">
                <img src="<?= $libro["imagen"] ?>">
                <div class="book__info">
                    <h3><?= htmlspecialchars($libro["titulo"]) ?></h3>
                    <p><?= htmlspecialchars($libro["autor"]) ?></p>
                    <p><?= htmlspecialchars($libro["categoria"]) ?></p>
                    <p><?= htmlspecialchars($libro["fecha_compra"]) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>