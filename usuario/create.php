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

    <div class="formuserinsert">
        <form>
            <div class="form-group">
                <label>Nome</label>
                <input type="textfield" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Idade</label>
                <input type="number" name="userage" class="form-control">
            </div>
            <div class="form-group">
                <label>RG</label>
                <input type="number" name="RG" class="form-control">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="number" name="CPF" class="form-control">
            </div>
            <label>Sexo</label>
            <br>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Masculino">
                    Masculino
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Feminino">
                    Feminino
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Outro">
                    Outro
                </label>
            </div>
            <div class="form-group">
                <label>Altura</label>
                <input type="number" name="userheight" class="form-control">
            </div>
            <div class="form-group">
                <label>Peso</label>
                <input type="number" name="userweight" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<script src="../js/libs/jquery.min.js"></script>
<script src="../js/libs/tether.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>
<script src="../js/libs/pace.min.js"></script>
</body>
</html>