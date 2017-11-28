<?php
include_once '../functions.php';

$id = $_GET['id'];

deleteUser('usuario', $id);

header("Location: index.php");

?>