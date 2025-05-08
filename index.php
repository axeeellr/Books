<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.html");
    exit;
}

$nombre = htmlspecialchars($_SESSION["usuario_nombre"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61fb4717c0.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/book.png">
    <title>Luz de Letras | Home</title>
</head>
<body>
    <header>
        <img src="img/book.png" alt="Libro">
        <div class="header__title">
            <h1>Luz De Letras</h1>
            <p>Organiza, descubre y disfruta</p>
        </div>
    </header>
    <div class="access__container">
        <h2>Bienvenido, <?php echo $nombre; ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
        <a href="logout.php">Cerrar sesión</a>
        <h2>Accesos Rápidos</h2>
        <div class="access__items">
            <div class="access" onclick="window.location='nuevoLibro.html'">
                <div class="access__info">
                    <h3>Agregar Libro</h3>
                    <p>Agrega tus libros favoritos para tenerlos siempre a mano.</p>
                </div>
                <div class="access__icon">
                    <i class="fa-solid fa-circle-plus"></i>
                </div>
            </div>
            <div class="access" onclick="window.location='libros.php'">
                <div class="access__info">
                    <h3>Mis Libros</h3>
                    <p>Busca los libros por Autor o por Título.</p>
                </div>
                <div class="access__icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="access" onclick="window.location='categorias.php'">
                <div class="access__info">
                    <h3>Categorías</h3>
                    <p>Accede a los libros clasificados por categorías.</p>
                </div>
                <div class="access__icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
            </div>
            <div class="access" onclick="window.location='listaDeseos.html'">
                <div class="access__info">
                    <h3>lista de Deseos</h3>
                    <p>Guarda los libros que deseas leer en el futuro.</p>
                </div>
                <div class="access__icon">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
            </div>
            <div class="access" onclick="window.location='nuevoAutor.html'">
                <div class="access__info">
                    <h3>Gestionar Autores</h3>
                    <p>Añade la información de tus autores favoritos.</p>
                </div>
                <div class="access__icon">
                    <i class="fa-solid fa-pen-nib"></i>
                </div>
            </div>
        </div>
    </div>
</body>
</html>