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
            <h1 class="h5 m-0">Editar Rotina</h1>
        </div>

        <div class="card-block">
            <form>
                <div class="form-group">
                    <label>Usuário:</label>
                    <input type="textfield" name="usuario" class="form-control">
                </div>
                <br>

                <!--Ex-->
                <label>Exercício 1</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="aparelho2">
                        <option>Aparelho1</option>
                        <option>Aparelho2</option>
                        <option>Aparelho3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="exercicio1">
                        <option>Exercício1</option>
                        <option>Exercício2</option>
                        <option>Exercício3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="textfield" name="repeticoes1" class="form-control">
                </div><br><br>
                <!--Ex-->

                <!--Ex-->
                <label>Exercício 2</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="aparelho2">
                        <option>Aparelho1</option>
                        <option>Aparelho2</option>
                        <option>Aparelho3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="exercicio1">
                        <option>Exercício1</option>
                        <option>Exercício2</option>
                        <option>Exercício3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="textfield" name="repeticoes1" class="form-control">
                </div><br><br>
                <!--Ex-->

                <!--Ex-->
                <label>Exercício 3</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="aparelho2">
                        <option>Aparelho1</option>
                        <option>Aparelho2</option>
                        <option>Aparelho3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="exercicio1">
                        <option>Exercício1</option>
                        <option>Exercício2</option>
                        <option>Exercício3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="textfield" name="repeticoes1" class="form-control">
                </div><br><br>
                <!--Ex-->

                <!--Ex-->
                <label>Exercício 4</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="aparelho2">
                        <option>Aparelho1</option>
                        <option>Aparelho2</option>
                        <option>Aparelho3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="exercicio1">
                        <option>Exercício1</option>
                        <option>Exercício2</option>
                        <option>Exercício3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="textfield" name="repeticoes1" class="form-control">
                </div><br><br>
                <!--Ex-->

                <!--Ex-->
                <label>Exercício 5</label>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aparelho</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="aparelho2">
                        <option>Aparelho1</option>
                        <option>Aparelho2</option>
                        <option>Aparelho3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Exercício</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="exercicio1">
                        <option>Exercício1</option>
                        <option>Exercício2</option>
                        <option>Exercício3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Repetições</label>
                    <input type="textfield" name="repeticoes1" class="form-control">
                </div><br><br>
                <!--Ex-->

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>