<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteMachine('aparelho', $id);

header("Location: index.php");

?>