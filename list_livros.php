<?php
require_once './vendor/autoload.php';

use AULA_PHP\MySQLConnection; //PDO;

$bd = new MySQLConnection(); //('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('select * from livros');
$comando-> execute();
$livros = $comando->fetchAll(PDO::FETCH_ASSOC);

$_title = "Livros"
?>

<?php include('./includes/header.php'); ?>

            <a class="btn btn-primary" href="insert_livro.php">NOVO LIVRO</a>
            
                    <table class="table table-borderless">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>&nbsp;</th>
                        </tr>
                            <?php foreach($livros as $l): ?>
                            <tr>
                                <td><?= $l['id']?></td>
                                <td><?=$l['titulo'] ?></td>
                                <td> <a class="btn btn-secondary" href="update_livro.php?id=<?=$g['id'] ?>">Editar</a> |
                                    <a class="btn btn-danger" href="delete_livro.php?id=<?=$g['id'] ?>">Remover</a></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
         
            <?php include('./includes/footer.php')?>