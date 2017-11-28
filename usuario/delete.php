<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteExercise('usuario', $id);

header("Location: index.php");

?>