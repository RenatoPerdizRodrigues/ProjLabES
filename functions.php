<?php
ob_start();
include_once 'config.php';

//Gera URLS absolutas
function generateRoute($url) {
    echo ROOT_FOLDER . $url;
}

// Redirect to
function redirectTo($page) {
    header("Location: " . ROOT_FOLDER . $page);
    exit();
}

//Messages
function checkForErrors() {
    if(isset($_SESSION['error']) && $_SESSION['error'] !== '') {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['error'];
        echo '</div>';

        unset($_SESSION['error']);
    }
}

function checkForSuccess() {
    if(isset($_SESSION['success']) && $_SESSION['success'] !== '') {
        echo '<div class="alert alert-success" role="alert">';
        echo $_SESSION['success'];
        echo '</div>';

        unset($_SESSION['success']);
    }
}

//Conexão
function connection() {
    return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

//Funções de Login
function sendToLogin() {
    // Se o usuário não estiver na página Login, redireciona
    $urlAtual = $_SERVER['REQUEST_URI'];
    $paginaAtual = substr($urlAtual, strrpos($urlAtual, '/') + 1);

    if($paginaAtual !== 'login.php') {
        header("Location: " . ROOT_FOLDER . "login.php");
        exit();
    } else {
        return false;
    }
}

function login($rg, $senha) {
    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM treinador WHERE RG = " . $rg;
    $result = mysqli_query(connection(), $query);
    $errors = 0;

    if($result && $result->num_rows > 0) {
        $usuario = array(
            'rg' => $rg
        );

        //Somente pega senha se existir uma linha em $result
        while($row = mysqli_fetch_assoc($result)) {
            $usuario['senha'] = $row['senha'];
        }

        //Verifica se a senha digitada é igual a senha criptografada do banco com a função do PHP
        if(password_verify($senha, $usuario['senha'])) {
            //Inicia sessão pra logar usuário
            unset($_SESSION['error']);
            $_SESSION['usuario'] = array(
              'rg' => $rg,
              'logado' => base64_encode(md5('sim'))
            );

            redirectTo('index.php');
        }else {
            $errors++;
        }
    }else {
        $errors++;
    }

    if($errors > 0) {
        $_SESSION['error'] = 'Usuário ou senha incorretos.';

        header("Location: " . ROOT_FOLDER . "login.php");
        exit();
    }
}

/**
 * SÓ USEI ESSA FUNÇÃO EMBAIXO PRA CRIAR UMA SENHA E COLAR NO BANCO DE DADOS PQ NÃO TEMOS CADASTRO DE USUÁRIO COM SENHA AINDA, SÓ PRA TESTAR.
 */
// $teste = password_hash('123456', PASSWORD_BCRYPT); ## GERANDO UMA PASSWORD CRIPTOGRAFADA SÓ PRA INSERIR MANUALMENTE NO BANCO -> $2y$10$ELle7P61oBPuiAPOYG9XWebjGLUyKVqY9nFvQiinsfJ6o4/Dm4dHO



//Valida SESSION do usuário
function auth() {
    if(!isset($_SESSION['usuario']['logado']) && $_SESSION['usuario']['logado'] !== base64_encode(md5('sim'))) {
        return sendToLogin();
    }
}

//Desloga usuário
function logout() {
    session_start();
    unset($_SESSION['usuario']);
    session_destroy();

    if(!isset($_SESSION['usuario'])) {
        return sendToLogin();
    }
}

//Funções de Treinador
function createTrainer($table){
    if (isset($_POST["submit"])) {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $idade = $_POST["idade"];
        $rg = $_POST["RG"];
        $cpf = $_POST["CPF"];
        $cart = $_POST["carteira"];
        $sal = $_POST["salario"];
        $datac = $_POST["datacontratacao"];
        $situacao = $_POST["ativo"];
        $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(nome, sobrenome, idade, RG, CPF, carteiraTrab, salario, dataContratacao, situacao, senha, permissao) VALUES ('$nome', '$sobrenome', '$idade' ,'$rg' ,'$cpf' ,'$cart' ,'$sal' ,'$datac' ,'$situacao', '$senha', '1')";


        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        if (!$result) {
            echo "Inserção deu errado!";
        } else echo "Inserção deu certo!";
    }

}

function indexTrainer($table){
    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }
}

function findTrainer($table, $id){
    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE id = " . $id;

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
}

function updateTrainer($table, $dados){
    $id = $_GET['id'];
    $nome = $dados['username'];
    $sobrenome = $dados['userage'];
    $idade = $dados['idade'];
    $rg = $dados['RG'];
    $cpf = $dados['CPF'];
    $cart = $dados['carteira'];
    $sal = $dados['salario'];
    $datac = $dados['datacontratacao'];


    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET nome='$nome',sobrenome='$sobrenome',idade='$idade',rg='$rg',cpf='$cpf',carteiraTrab='$cart',salario='$sal',dataContratacao='$datac' WHERE id='$id'";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Edit deu certo";
    } else echo "Edit deu errado seu BURRO";

    header("Location: index.php");
}

function deleteTrainer($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "DELETE FROM $table WHERE id=$id";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Delete deu certo";
    } else echo "Delete deu errado seu BURRO";
}

//Funções de Usuário
function createUser($table){
    if (isset($_POST["submit"])) {




        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $idade = $_POST["idade"];
        $rg = $_POST["RG"];
        $cpf = $_POST["CPF"];
        $sexo = $_POST["sexo"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];
        $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);


        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(nome, sobrenome, idade, RG, CPF, sexo, altura, peso, senha, permissao, temrotina) VALUES ('$nome', '$sobrenome', '$idade' ,'$rg' ,'$cpf' , '$sexo', '$altura', '$peso', '$senha', 0, 0)";

        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        if (!$result) {
            echo "Inserção deu errado!";
        } else echo "Inserção deu certo!";
    }

}

function indexUser($table){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }
}

function findUser($table, $id){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE id = " . $id;

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
}

function updateUser($table, $dados){



    $id = $_GET['id'];
    $nome = $dados['nome'];
    $sobrenome = $dados['sobrenome'];
    $idade = $dados['idade'];
    $rg = $dados['RG'];
    $cpf = $dados['CPF'];
    $altura = $dados['altura'];
    $peso = $dados['peso'];


    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET nome='$nome',sobrenome='$sobrenome',idade='$idade',rg='$rg',cpf='$cpf',altura='$altura',peso='$peso' WHERE id='$id'";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Edit deu certo";
    } else echo "Edit deu errado seu BURRO";

    header("Location: index.php");
}

function deleteUser($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "DELETE FROM $table WHERE id=$id";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Delete deu certo";
    } else echo "Delete deu errado seu BURRO";
}

//Funções de Exercício
function createExercise($table){
    if(isset($_POST["submit"])){



        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];

        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(nome, descricao) VALUES ('$nome', '$descricao')";

        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        if(!$result){
            echo "Inserção deu errado!";
        } else echo "Inserção deu certo!";
    }
}

function indexExercise($table){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
}

function findExercise($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE exercicioID = " . $id;

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
}

function findExerciseArray($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE exercicioID = " . $id;

    $data = array();
    $result = mysqli_query(connection(), $query);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}

function updateExercise($table, $dados){



    $id = $_GET['id'];
    $nome = $dados['nome'];
    $descricao = $dados['descricao'];



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET nome='$nome',descricao='$descricao' WHERE exercicioID='$id'";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Edit deu certo";
    } else echo "Edit deu errado seu BURRO";

    header("Location: index.php");
}

function deleteExercise($table, $id){
    $rotina = "SELECT rotinaID FROM rotina WHERE ex1 = $id OR ex2 = $id OR ex3 = $id OR ex4 = $id OR ex5 = $id";
    $rotinatrue = mysqli_query(connection(), $rotina);

    if ($rotinatrue->num_rows >= 1) {
        $_SESSION['error'] = 'Não foi possível excluir.';
    }else {
        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "DELETE FROM $table WHERE exercicioID=$id";

        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.

        $_SESSION['success'] = 'Excluiu.';
        $result = mysqli_query(connection(), $query);
        if (!$result) {
            $_SESSION['error'] = 'Não foi possível excluir.';
        }
    }

    redirectTo('exercicioap/index.php');
}

//Funções de Aparelho
function createMachine($table){
    if (isset($_POST["submit"])) {
        $marca = $_POST["modelo"];
        $modelo = $_POST["marca"];
        $dataAquisicao = $_POST["dataaq"];
        $ultimaManutencao = $_POST["datamanutencao"];


        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(modelo, marca, dataAquisicao, ultimaManutencao) VALUES ('$marca', '$modelo', '$dataAquisicao' ,'$ultimaManutencao')";


        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        var_dump($query);
        if (!$result) {
            echo "Inserção deu errado!";
        } else echo "Inserção deu certo!";
    }

}

function indexMachine($table){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }
}

function findMachine($table, $id){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE aparelhoID = " . $id;

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        //$row = mysqli_fetch_assoc($result);
        return $result;
    }
}

function findMachineArray($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table WHERE aparelhoID = " . $id;

    $data = array();
    $result = mysqli_query(connection(), $query);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}

function updateMachine($table, $dados){



    $id = $_GET['id'];
    $marca = $dados["marca"];
    $modelo = $dados["modelo"];
    $dataAquisicao = $dados["dataaq"];
    $ultimaManutencao = $dados["datamanutencao"];


    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET marca='$marca',modelo='$modelo',dataAquisicao='$dataAquisicao',ultimaManutencao='$ultimaManutencao' WHERE aparelhoID='$id'";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Edit deu certo";
    } else echo "Edit deu errado seu BURRO";

    header("Location: index.php");
}

function deleteMachine($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "DELETE FROM $table WHERE aparelhoID=$id";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Delete deu certo";
    } else echo "Delete deu errado seu BURRO";
}


//Funções de Rotina
function findAllMachines(){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM aparelho";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }


}

function findAllExercises(){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM exercicio";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }


}

function createRoutine($table){
    if (isset($_POST["submit"])) {




        $id = $_GET['id'];
        $ex1 = $_POST["ex1"];
        $ap1 = $_POST["ap1"];
        $rep1 = $_POST["rep1"];

        $ex2 = $_POST["ex2"];
        $ap2 = $_POST["ap2"];
        $rep2 = $_POST["rep2"];

        $ex3 = $_POST["ex3"];
        $ap3 = $_POST["ap3"];
        $rep3 = $_POST["rep3"];

        $ex4 = $_POST["ex4"];
        $ap4 = $_POST["ap4"];
        $rep4 = $_POST["rep4"];

        $ex5 = $_POST["ex5"];
        $ap5 = $_POST["ap5"];
        $rep5 = $_POST["rep5"];



        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(rotinaID, ex1, ap1, rep1,ex2, ap2, rep2,ex3, ap3, rep3,ex4, ap4, rep4,ex5, ap5, rep5) VALUES ('$id', '$ex1', '$ap1', '$rep1' ,'$ex2', '$ap2', '$rep2' ,'$ex3', '$ap3', '$rep3' ,'$ex4', '$ap4', '$rep4' ,'$ex5', '$ap5', '$rep5')";


        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        var_dump($result);
        if ($result) {
            echo "Inserção deu certo!";
            setRoutine($id);
        } else echo "Inserção deu errado!";
    }

}

function setRoutine($id){
            $query = "UPDATE usuario SET temrotina='1' WHERE ID=$id";
            mysqli_query(connection(), $query);
            redirectTo('rotina/index.php');
}

function indexRoutine($table){




    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM $table";

    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        return $result;
    }
}

function findRoutine($table, $id){




    //Criando a query, com o nome das colunas e valores inseridos.
    //$query = "SELECT * FROM $table INNER JOIN exercicio ON exercicio.exercicioID = rotina.ex1 OR exercicio.exercicioID = rotina.ex2 OR exercicio.exercicioID = rotina.ex3 OR exercicio.exercicioID = rotina.ex4 OR exercicio.exercicioID = rotina.ex5 WHERE rotinaID = " . $id . "";
    $query = "SELECT * FROM $table WHERE rotinaID = " . $id . "";

    $data = array();
    $result = mysqli_query(connection(), $query);
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        connection()->close();
        return $data;
    }



}

function updateRoutine($table, $dados){



    $id = $_GET['id'];
    $marca = $dados["marca"];
    $modelo = $dados["modelo"];
    $dataAquisicao = $dados["dataaq"];
    $ultimaManutencao = $dados["datamanutencao"];


    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET marca='$marca',modelo='$modelo',dataAquisicao='$dataAquisicao',ultimaManutencao='$ultimaManutencao' WHERE aparelhoID='$id'";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Edit deu certo";
    } else echo "Edit deu errado seu BURRO";

    header("Location: index.php");
}

function deleteRoutine($table, $id){



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "DELETE FROM $table WHERE aparelhoID=$id";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Delete deu certo";
    } else echo "Delete deu errado seu BURRO";
}

?>