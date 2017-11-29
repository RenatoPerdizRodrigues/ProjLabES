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
            <h1 class="h5 m-0">Adicionar Aparelho</h1>
        </div>

        <div class="card-block">
            <form  action="create.php" method="post">
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="textfield" name="modelo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="textfield" name="marca" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Data de Aquisição</label>
                    <input type="date" name="dataaq" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Última Manutenção</label>
                    <input type="date" name="datamanutencao" class="form-control" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" style="display:inline-block;">Enviar</button>

                <a class="btn btn-primary pull-right" href="index.php" role="button">Voltar ao Index</a>
            </form>
        </div>
    </div>
</div>

<?php
$table = 'aparelho';
createMachine($table)?>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>