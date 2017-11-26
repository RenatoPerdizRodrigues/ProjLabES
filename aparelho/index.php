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
            <h1 class="h5 m-0">Lista de Exercícios</h1>
        </div>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Data Aquisição</th>
                <th>Ultima Manutenção</th>
                <th style="width: 300px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Esteira</td>
                <td>Nakagym</td>
                <td>16/11/2011</td>
                <td>01/01/2017</td>
                <td>
                    <a class="btn btn-primary" href="edit.php" role="button">Editar</a>
                    <a class="btn btn-primary" href="delete.php" role="button">Excluir</a>
                </td>
                <div>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Supino Vertical</td>
                <td>Nakagym</td>
                <td>16/11/2011</td>
                <td>01/01/2017</td>
                <td>
                    <a class="btn btn-primary" href="edit.php" role="button">Editar</a>
                    <a class="btn btn-primary" href="delete.php" role="button">Excluir</a>
                </td>
                <div>
            </tr>
        </table>


    </div>
</div>
</div>


<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>