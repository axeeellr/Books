<?php

require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $passwordHash, PDO::PARAM_STR);
   
    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes iniciar sesión <a href='login.html'>Iniciar sesión</a>";
    } else {
        echo "Error al registrar usuario.";
    }

}
