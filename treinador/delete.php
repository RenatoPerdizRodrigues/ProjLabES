<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteTrainer('treinador', $id);

header("Location: index.php");

?>