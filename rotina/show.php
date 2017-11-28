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
<?php include_once '../header.php';
$var = findRoutine('rotina', $_GET['id']);
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Rotina do Usuário</h1>
        </div>



        <table class="table table-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>Exercício</th>
                <th>Aparelho</th>
                <th>Repetições</th>
            </tr>
            </thead>

            <tbody>

            <?php
                $var1 = 1;
                foreach($var as $rotina){
                    $var1 = $rotina['ex1'];
            }
                $nex = findExercise('rotina', $var1);
                echo "<pre>";
                var_dump($nex);



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