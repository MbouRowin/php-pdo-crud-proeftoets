<?php

// https://stackoverflow.com/questions/30074492/what-is-the-difference-between-utf8mb4-and-utf8-charsets-in-mysql
$dsn = "mysql:host=localhost;dbname=php-pdo-crud-proeftoets;charset=utf8mb4";

$options = [
    // Default is FETCH_BOTH (both indexed and associative array)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, "root", "", $options);

$people = $pdo->query('SELECT * FROM RichestPeople ORDER BY Networth DESC');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Naam</th>
            <th>Vermogen</th>
            <th>Leeftijd</th>
            <th>Bedrijf</th>
            <th>Delete</th>
        </tr>
        <?php while ($row = $people->fetch()) : ?>
            <tr>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['Networth'] ?></td>
                <td><?= $row['Age'] ?></td>
                <td><?= $row['MyCompany'] ?></td>
                <td>Delete</td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>