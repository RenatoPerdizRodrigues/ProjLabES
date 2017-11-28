<?php
    session_start();
    include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.min" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/stylesheetjr.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <a class="navbar-brand" >Xtreme Xcercise</a>
</nav>

<div class="container mt-3" style="width: 350px; position: relative; top: 150px;">
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
            <h1 class="h5 m-0">Login</h1>
        </div>

        <div class="card-block">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label>RG</label>
                    <input type="text" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<div class="welcome">
    <h1>Seja bem-vindo!</h1>
    <?php echo "<h4>Hoje é dia " . date("d/m/y</h4>");?>
</div>

    <?php
    if (isset($_POST["submit"])) {
        $senha = $_POST["senha"];
        $rg = $_POST["login"];
        login($rg, $senha);
    }
    ?>

<script src="js/libs/jquery.min.js"></script>
<script src="js/libs/tether.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>
<script src="js/libs/pace.min.js"></script>
</body>
</html>