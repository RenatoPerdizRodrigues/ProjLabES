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
            <h1 class="h5 m-0">Informações de Usuário</h1>
        </div>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Carteira de Trabalho</th>
                <th>Salário</th>
                <th>Data de Contratação</th>
            </tr>
            </thead>
            <tbody>

            <th scope="row">1</th>
            <td>Maria</td>
            <td>Carolina</td>
            <td>599068047</td>
            <td>65306598562</td>
            <td>Feminino</td>
            <td>165</td>
                </tr>
            </tbody>
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