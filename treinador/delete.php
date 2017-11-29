<?php
include_once '../functions.php';
auth();

$id = $_GET['id'];

deleteTrainer('treinador', $id);

header("Location: index.php");

?>