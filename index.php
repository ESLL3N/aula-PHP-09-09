<?php
require_once './vendor/autoload.php';

use PDO;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
$comando = $bd->prepare('INSERT INTO generos(nome) values (:nome)');
$comando-> execute(['nome' => $_POST['nome']]);

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>BIBLIOTECA</title>
</head>
<body>
    <a href="insert.php">Novo genero</a>
    <pre>
        <?php var_dump($generos); ?>
    </pre>

</body>
</html>