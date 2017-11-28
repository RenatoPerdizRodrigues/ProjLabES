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
$ap = findAllMachines();
$ap2 = findAllMachines();
$ap3 = findAllMachines();
$ap4 = findAllMachines();
$ap5 = findAllMachines();
$ex = findAllExercises();
$ex2 = findAllExercises();
$ex3 = findAllExercises();
$ex4 = findAllExercises();
$ex5 = findAllExercises();


?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Adicionar Rotina</h1>
        </div>

        <div class="card-block">
            <form action="create.php?id=<?php echo $_GET['id'];?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['$id'];?>">

                <!--Cada formulário de rotina-->
                <label>Exercício 1</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ap1">
                        <?php while($row = mysqli_fetch_assoc($ap)) {
                            echo "<option value=" . $row['aparelhoID'] . ">" . $row['modelo'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex1">
                        <?php while($row = mysqli_fetch_assoc($ex)){
                            echo "<option value=" . $row['exercicioID'] . ">" . $row['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="number" name="rep1" class="form-control">
                </div>
                <br><br><br>

                <!--Fim do formulário de rotina-->


                <!--Cada formulário de rotina-->
                <label>Exercício 2</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ap2">
                        <?php while($row = mysqli_fetch_assoc($ap2)) {
                            echo "<option value=" . $row['aparelhoID'] . ">" . $row['modelo'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex2">
                        <?php while($row = mysqli_fetch_assoc($ex2)){
                            echo "<option value=" . $row['exercicioID'] . ">" . $row['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="number" name="rep2" class="form-control">
                </div>
                <br><br><br>

                <!--Fim do formulário de rotina-->



                <!--Cada formulário de rotina-->
                <label>Exercício 3</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ap3">
                        <?php while($row = mysqli_fetch_assoc($ap3)) {
                            echo "<option value=" . $row['aparelhoID'] . ">" . $row['modelo'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex3">
                        <?php while($row = mysqli_fetch_assoc($ex3)){
                            echo "<option value=" . $row['exercicioID'] . ">" . $row['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="number" name="rep3" class="form-control">
                </div>
                <br><br><br>

                <!--Fim do formulário de rotina-->


                <!--Cada formulário de rotina-->
                <label>Exercício 4</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ap4">
                        <?php while($row = mysqli_fetch_assoc($ap4)) {
                            echo "<option value=" . $row['aparelhoID'] . ">" . $row['modelo'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex4">
                        <?php while($row = mysqli_fetch_assoc($ex4)){
                            echo "<option value=" . $row['exercicioID'] . ">" . $row['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="number" name="rep4" class="form-control">
                </div>
                <br><br><br>

                <!--Fim do formulário de rotina-->

                <!--Cada formulário de rotina-->
                <label>Exercício 5</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ap5">
                        <?php while($row = mysqli_fetch_assoc($ap5)) {
                            echo "<option value=" . $row['aparelhoID'] . ">" . $row['modelo'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="ex5">
                        <?php while($row = mysqli_fetch_assoc($ex5)){
                            echo "<option value=" . $row['exercicioID'] . ">" . $row['nome'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="number" name="rep5" class="form-control">
                </div>
                <br>

                <!--Fim do formulário de rotina-->

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
$table = 'rotina';
createRoutine($table);
?>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>