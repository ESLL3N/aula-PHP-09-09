<?php
require_once './vendor/autoload.php';

use AULA_PHP\MySQLConnection; //PDO;

$bd = new MySQLConnection();

if($_SERVER['REQUEST_METHOD'] == 'GET'); {
$comando = $bd->prepare('select * from generos');
$comando-> execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include('./includes/header.php'); ?>

<h1>Novo Livro</h1>
<form action="insert_livro.php" method="post">
    <div class="form-group">
        <label for="titulo">Titulo</label>
            <input class="form-control" type="text" name="titulo" />
    </div>
    <div class="form-group">
        <label for="genero">Gênero</label>
           <select name="genero" class="form-select"> 
                <?php foreach($generos as $g) : ?>
                    <option value="<?= $g['id'] ?>">
                        <?=$g['nome']?>
                    
                </option>
                <?php endforeach ?>
    </div>
        <br>
        <a class="btn btn-secondary" href="index.php">Voltar</a>
        <button class="btn btn-success" type="submit">Salvar</button>

</form>


<?php include('./includes/footer.php'); ?>