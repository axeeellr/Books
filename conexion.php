<?php

try
{
    $conn = new PDO('mysql:host=localhost;dbname=gestion_libros', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERROR: " . $e->getMessage();
}
?>
