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
                <h1 class="h5 m-0">Lista de Usuários</h1>
            </div>

            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th style="width: 300px;">Ações</th>
                </tr>
                </thead>
                <tbody>

                    <th scope="row">1</th>
                    <td>Maria</td>
                    <td>599068047</td>
                    <td>
                        <a class="btn btn-primary" href="show.php" role="button">Informações</a>
                        <a class="btn btn-primary" href="edit.php" role="button">Editar</a>
                        <a class="btn btn-primary" href="delete.php" role="button">Excluir</a>
                    </td>
                        <div>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Roberto</td>
                    <td>36506807</td>
                    <td>
                        <a class="btn btn-primary" href="show.php" role="button">Informações</a>
                        <a class="btn btn-primary" href="edit.php" role="button">Editar</a>
                        <a class="btn btn-primary" href="delete.php" role="button">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Victor</td>
                    <td>58951624</td>
                    <td>
                        <a class="btn btn-primary" href="show.php" role="button">Informações</a>
                        <a class="btn btn-primary" href="edit.php" role="button">Editar</a>
                        <a class="btn btn-primary" href="delete.php" role="button">Excluir</a>
                    </td>
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