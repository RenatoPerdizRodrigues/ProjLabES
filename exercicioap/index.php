<?php
    session_start();
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
<?php include_once '../header.php';

    $table = 'exercicio';
    $var = indexExercise($table);

?>


<div class="container mt-3">
    <?php
        if(isset($_SESSION['error']) && $_SESSION['error'] !== '') {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_SESSION['error'];
            echo '</div>';

            unset($_SESSION['error']);
        }
    ?>
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Lista de Exercícios</h1>
        </div>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th style="width: 300px;">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row = mysqli_fetch_assoc($var)) {
                echo "<tr>";
                echo "<th>" . $row['exercicioID'] . "</th>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>";
                echo "<a class=\"btn btn-primary mr-2\" href=\"edit.php?id=" . $row['exercicioID'] . " \" role=\"button\">Editar</a>";
                echo "<a class=\"btn btn-primary mr-2\" href=\"delete.php?id=" . $row ['exercicioID'] . " \" role=\"button\">Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>


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