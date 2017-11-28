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
    $table = 'treinador';
    $var = findTrainer('treinador', $_GET['id']);
    $row = mysqli_fetch_assoc($var);

    if(isset($_POST["submit"])){
        updateTrainer('treinador', $_POST);
    }

?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Editar Treinador</h1>
        </div>

        <div class="card-block">
            <form action="edit.php?id=<?php echo $_GET['id'];?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['$id'];?>">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="username" class="form-control" value="<?php echo $row['nome'];?>">
                </div>
                <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="textfield" name="userage" class="form-control" value="<?php echo $row['sobrenome'];?>">
                </div>
                <div class="form-group">
                    <label>Idade</label>
                    <input type="number" name="idade" class="form-control" value="<?php echo $row['idade'];?>">
                </div>
                <div class="form-group">
                    <label>RG</label>
                    <input type="number" name="RG" class="form-control" value="<?php echo $row['RG'];?>">
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input type="number" name="CPF" class="form-control" value="<?php echo $row['CPF'];?>">
                </div>
                <div class="form-group">
                    <label>Carteira de Trabalho</label>
                    <input type="number" name="carteira" class="form-control" value="<?php echo $row['carteiraTrab'];?>">
                </div>
                <div class="form-group">
                    <label>Salário</label>
                    <input type="number" name="salario" class="form-control" value="<?php echo $row['salario'];?>">
                </div>
                <div class="form-group">
                    <label>Data de Contratação</label>
                    <input type="date" name="datacontratacao" class="form-control" value="<?php echo $row['dataContratacao'];?>">
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