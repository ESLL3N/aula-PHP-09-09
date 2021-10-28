<?php
require_once './vendor/autoload.php';

use AULA_PHP\MySQLConnection; //PDO;

$bd = new MySQLConnection();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
$comando = $bd->prepare('select * from generos');
$comando-> execute();

$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

$comando_l =$bd->prepare('SELECT * FROM livros WHERE id = :id');
$comando_l->execute([':id' => $_GET['id']]);
$livro = $comando->fetchAll(PDO::FETCH_ASSOC);
} else {
    $comando =$bd->prepare('UPDATE livros SET titulo = :titulo, id_genero = :genero WHERE id =:id');
    $comando->execute([
    ':titulo' => $_POST['titulo'],
    ':genero' => $_POST['genero'],
    ':id' => $_POST['id']]);
    header('Location:/list_livros.php');
}

$_title ="Novo Livro"
?>

<?php include('./includes/header.php'); ?>

<h1>Novo Livro</h1>
<form action="update_livro.php" method="post">
    <input type="hidden" name="id" value=<?= $livro['id'] ?> >
    <div class="form-group">
        <label for="titulo">Titulo</label>
            <input class="form-control" type="text" name="titulo" value="<?= $livro['titulo'] ?>"/>
    </div>
    <div class="form-group">
        <label for="genero">Gênero</label>
           <select name="genero" class="form-select"> 
                <?php foreach($generos as $g) : ?>
                    <option value="<?= $g['id'] ?>"
                    <?= ($livro['id_genero'] == $g['id']) ? 'selected' : '' ?>>
                        <?=$g['nome']?>
                    
                    </option>
                <?php endforeach ?>
            </select>
    </div>
        <br>
        <a class="btn btn-secondary" href="index.php">Voltar</a>
        <button class="btn btn-success" type="submit">Salvar</button>

</form>


<?php include('./includes/footer.php'); ?>