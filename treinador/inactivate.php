<?php
include_once '../functions.php';
auth();

$id = $_GET['id'];

//Comando que faz a conexão: Local, username, senha (vazia), e nome do BD
$connection = mysqli_connect("localhost", "root", "", "xtreme_xcercise");


//Criando a query, com o nome das colunas e valores inseridos.
$query = "UPDATE treinador set situacao = 'Inativo' WHERE ID = " . $id;

//Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
$result = mysqli_query($connection, $query);
if (!$result) {
    $_SESSION['error'] = 'Não foi possível inativar.';
} else {
    $_SESSION['success'] = 'O treinador foi inativado.';
}

redirectTo('treinador/index.php');


?>