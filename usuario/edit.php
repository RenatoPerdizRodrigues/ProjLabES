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
    $row = mysqli_fetch_assoc($var);

    if(isset($_POST["submit"])){
        updateUser('usuario', $_POST);
    }
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Editar usuário</h1>
        </div>

        <div class="card-block">
            <form  action="edit.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="textfield" name="nome" class="form-control" value="<?php echo $row['nome'];?>">
                </div>
                <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="textfield" name="sobrenome" class="form-control" value="<?php echo $row['sobrenome'];?>">
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
                    <label>Altura</label>
                    <input type="number" name="altura" class="form-control" value="<?php echo $row['altura'];?>">
                </div>
                <div class="form-group">
                    <label>Peso</label>
                    <input type="number" name="peso" class="form-control" value="<?php echo $row['peso'];?>">
                </div>

                <button type="submit" name="submit" class="btn btn-primary" style="display:inline-block;">Enviar</button>

                <a class="btn btn-primary pull-right" href="index.php" role="button">Voltar ao Index</a>

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