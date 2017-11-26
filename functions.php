<?php
    include_once 'config.php';

    // generate urls according to root folder
    function generateRoute($url) {
        echo ROOT_FOLDER . $url;
    }

    function createExercise($table){
        if(isset($_POST["submit"])){
            //Comando que faz a conexão: Local, username, senha (vazia), e nome do BD
            $connection = mysqli_connect("localhost", "root", "", "xtreme_xcercise");

            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];

            //Criando a query, com o nome das colunas e valores inseridos.
            $query = "INSERT INTO $table(nome, descricao) VALUES ('$nome', '$descricao')";

            //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
            $result = mysqli_query($connection, $query);
            if(!$result){
                echo "Inserção deu errado!";
            } else echo "Inserção deu certo!";
        }
    }

    function indexExercise($table){

            //Comando que faz a conexão: Local, username, senha (vazia), e nome do BD
            $connection = mysqli_connect("localhost", "root", "", "xtreme_xcercise");


            //Criando a query, com o nome das colunas e valores inseridos.
            $query = "SELECT * FROM $table";

            //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
            $result = mysqli_query($connection, $query);
            if($result) {
                $row = mysqli_fetch_assoc($result);

                foreach ($row as $exercicio) {
                    echo $exercicio['nome'];
                }


            }

    }
?>