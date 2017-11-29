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
$var = indexUser($table);
?>




    <div class="container mt-3">
        <?php {
            checkForSuccess();
        } ?>
        <div class="card">
            <div class="card-header">
                <h1 class="h5 m-0">Lista de Usuários</h1>
            </div>

            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>RG</th>
                    <th style="width: 300px;">Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while($row = mysqli_fetch_assoc($var)) {
                    echo "<tr>";
                    echo "<th>" . $row['id'] . "</th>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['sobrenome'] . "</td>";
                    echo "<td>" . $row['RG'] . "</td>";
                    echo "<td>";
                    echo "<a class=\"btn btn-primary mr-1\" href=\"show.php?id=" . $row['id'] . " \" role=\"button\">Informações</a>";
                    echo "<a class=\"btn btn-primary mr-1\" href=\"edit.php?id=" . $row['id'] . " \" role=\"button\">Editar</a>";
                    echo "<a class=\"btn btn-primary mr-1\" href=\"delete.php?id=" . $row['id'] . " \" role=\"button\">Excluir</a>";

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