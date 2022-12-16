<?php

// https://stackoverflow.com/questions/30074492/what-is-the-difference-between-utf8mb4-and-utf8-charsets-in-mysql
$dsn = 'mysql:host=localhost;dbname=php-pdo-crud-proeftoets;charset=utf8mb4';

$options = [
    // Default is FETCH_BOTH (both indexed and associative array)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Connect to database
$pdo = new PDO($dsn, 'root', '', $options);

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('DELETE FROM RichestPeople WHERE Id = :Id');
    $stmt->bindValue(":Id", $_GET['id']);
    $stmt->execute();
    header('Refresh: 3; url=read.php');
    echo "Record verwijderd.";
}
