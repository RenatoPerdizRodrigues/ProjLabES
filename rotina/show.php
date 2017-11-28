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

        <?php
            $rotinas = array();

            foreach($var as $rotina) {
                unset($rotina['rotinaID']);

                $rotinas[1] = array_slice($rotina, 0, 3);
                $rotinas[2] = array_slice($rotina, 3, 3);
                $rotinas[3] = array_slice($rotina, 6, 3);
                $rotinas[4] = array_slice($rotina, 9, 3);
                $rotinas[5] = array_slice($rotina, 12, 3);
            }

            $counter = 1;

            foreach($rotinas as $rotina) {
                $rotinaEx = $rotina['ex' . $counter];
                $rotinaAp = $rotina['ap' . $counter];
                $rotinaRep = $rotina['rep' . $counter];
                $exercicio = findExerciseArray('exercicio', $rotinaEx);
                $aparelho = findMachineArray('aparelho', $rotinaAp);

                $rotinaEx = $exercicio[0]['nome'];
                $rotinaAp = $aparelho[0]['modelo'];

                echo '<table class="table table-responsive">';
                echo '<thead>';
                echo '<tr>';
                    echo '<th colspan="3">Rotina ' . $counter . '</th>';
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Exercício</th>';
                    echo '<th>Aparelho</th>';
                    echo '<th>Repetições</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo "<tr>";
                    echo "<td>" . $rotinaEx . "</td>";
                    echo "<td>" . $rotinaAp . "</td>";
                    echo "<td>" . $rotinaRep . "</td>";
                echo "</tr>";
                echo '</tbody>';
                echo '</table>';

                $counter++;
            }
        ?>
    </div>
</div>
</div>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>