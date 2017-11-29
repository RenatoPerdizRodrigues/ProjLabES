<?php
include_once '../functions.php';
auth();
$id = $_GET['id'];
deleteMachine('aparelho', $id);
?>