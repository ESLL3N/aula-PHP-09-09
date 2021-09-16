<?php
require_once './vendor/autoload.php';

use PDO;

$bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('INSERT INTO generos(nome) values (:nome)');
$comando-> execute(['nome' => $_POST['nome']]);




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>BIBLIOTECA</title>
</head>
<body>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id']?></td>
                    <td><?=$g['nome'] ?></td>
                </tr>
                <?php endforeach ?>
        </table>
</body>
</html>