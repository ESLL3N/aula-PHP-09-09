<?php
require_once './vendor/autoload.php';

use PDO;

$bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd ->prepare('select * from generos');
$comando->execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>BIBLIOTECA</title>
</head>
<body>
    <pre>
        <?php var_dump($generos); ?>
    </pre>


    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Nome
            </th>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>