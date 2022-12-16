<?php

// https://stackoverflow.com/questions/30074492/what-is-the-difference-between-utf8mb4-and-utf8-charsets-in-mysql
$dsn = 'mysql:host=localhost;dbname=php-pdo-crud-proeftoets;charset=utf8mb4';

$options = [
    // Default is FETCH_BOTH (both indexed and associative array)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Connect to database
$pdo = new PDO($dsn, 'root', '', $options);

// Select all people
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

        a,
        svg {
            display: block;
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
                <td>
                    <a href="delete.php?id=<?= $row['Id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>