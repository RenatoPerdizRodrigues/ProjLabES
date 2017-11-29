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
<?php include_once '../header.php';
$table = 'usuario';
$var = findUser('usuario', $_GET['id']);
?>

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
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Sexo</th>
                <th>Altura</th>
                <th>Peso</th>
            </tr>
            </thead>

            <tbody>

            <?php
            while($row = mysqli_fetch_assoc($var)) {
                echo "<tr>";
                echo "<th>" . $row['id'] . "</th>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['sobrenome'] . "</td>";
                echo "<td>" . $row['idade'] . "</td>";
                echo "<td>" . $row['RG'] . "</td>";
                echo "<td>" . $row['CPF'] . "</td>";
                echo "<td>" . $row['sexo'] . "</td>";
                echo "<td>" . $row['altura'] . "</td>";
                echo "<td>" . $row['peso'] . "</td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>


        </div>
    <a class="btn btn-primary pull-right" href="index.php" role="button">Voltar ao Index</a>
    </div>
</div>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>