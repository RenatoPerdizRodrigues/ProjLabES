<?php
include_once '../functions.php';
auth();

$id = $_GET['id'];

deleteUser('usuario', $id);

header("Location: index.php");

?>