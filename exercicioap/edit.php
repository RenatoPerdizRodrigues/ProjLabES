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
$table = 'exercicio';
$var = findExercise('exercicio', $_GET['id']);
$row = mysqli_fetch_assoc($var);

    if(isset($_POST["submit"])){
        updateExercise('exercicio', $_POST);
    }
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Editar Exercício</h1>
        </div>

        <div class="card-block">
            <form action="edit.php?id=<?php echo $_GET['id'];?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['$id'];?>">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="nome" value="<?php echo $row['nome'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="textfield" name="descricao" value="<?php echo $row['descricao'];?>" class="form-control">
                </div>

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