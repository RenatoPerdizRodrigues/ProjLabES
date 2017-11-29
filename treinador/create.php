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
            <h1 class="h5 m-0">Adicionar Treinador</h1>
        </div>

        <div class="card-block">
            <form  action="create.php" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="textfield" name="sobrenome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Idade</label>
                    <input type="number" name="idade" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>RG</label>
                    <input type="number" name="RG" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="number" name="CPF" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Carteira de Trabalho</label>
                    <input type="number" name="carteira" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Salário</label>
                    <input type="number" name="salario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Data de Contratação</label>
                    <input type="date" name="datacontratacao" class="form-control" required>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ativo" value="Ativo" required>
                        Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ativo" value="Inativo" required>
                        Inativo
                    </label>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <br>

                <button type="submit" name="submit" class="btn btn-primary" style="display:inline-block;">Enviar</button>

                <a class="btn btn-primary pull-right" href="index.php" role="button">Voltar ao Index</a>
            </form>
        </div>
    </div>
</div>

<?php
$table = 'treinador';
createTrainer($table)?>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>