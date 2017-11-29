<?php
    include_once '../functions.php';
    auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/simple-line-icons.min" rel="stylesheet">
    <link href="../css/style.min.css" rel="stylesheet">
    <link href="../css/stylesheetjr.css" rel="stylesheet">
</head>
<body>
<?php include_once '../header.php'; ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Adicionar Exercício</h1>
        </div>

        <div class="card-block">
            <?php
                $table = 'exercicio';

                if(isset($_POST['submit'])) {
                    $erros = 0;

                    // Se nao tiver setado ou estiver vazio
                    if(!isset($_POST['nome']) || $_POST['nome'] === '') {
                        $erro_nome = 'Nome é obrigatório';
                        $erros++;
                    }

                    if(!isset($_POST['descricao']) || $_POST['descricao'] === '') {
                        $erro_descricao = 'Descrição é obrigatório';
                        $erros++;
                    }

                    if(!$erros) {
                        createExercise($table);
                    }
                }
            ?>

            <form action="create.php" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="nome" class="form-control">
                    <?php
                        if(isset($erro_nome)) {
                            echo '<small class="text-danger">';
                                echo $erro_nome;
                            echo '</small>';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="textfield" name="descricao" class="form-control">
                    <?php
                        if(isset($erro_descricao)) {
                            echo '<small class="text-danger">';
                                echo $erro_descricao;
                            echo '</small>';
                        }
                    ?>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" style="display:inline-block;">Enviar</button>

                <a class="btn btn-primary pull-right" href="index.php" role="button">Voltar ao Index</a>
            </form>
        </div>
    </div>
</div>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>