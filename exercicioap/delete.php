<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteExercise('exercicio', $id);

header("Location: index.php");

?>