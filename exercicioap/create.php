<?php
include_once '../functions.php';
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
            <form action="create.php" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="textfield" name="descricao" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

    <?php
    $table = 'exercicio';
    createExercise($table)?>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>