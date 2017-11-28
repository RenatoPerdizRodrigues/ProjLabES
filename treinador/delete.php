<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteExercise('treinador', $id);

header("Location: index.php");

?>