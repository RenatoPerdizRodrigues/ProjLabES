<?php
    include_once 'functions.php';
auth();
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
    <?php include_once 'header.php'; ?>

    <div class="welcome">
        <h1>Olá, <?php echo $_SESSION['usuario']['nome'] ?></h1>
        <h4>Você está logado</h4>
    </div>



    <script src="js/libs/jquery.min.js"></script>
    <script src="js/libs/tether.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/pace.min.js"></script>
</body>
</html>