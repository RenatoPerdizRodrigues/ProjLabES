<?php
include_once 'config.php';

//Gera URLS absolutas
function generateRoute($url) {
    echo ROOT_FOLDER . $url;
}

//Conexão
function connection() {
    return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

//Funções de Login
function sendToLogin($paginaAtual) {
    // Se o usuário não estiver na página Login, redireciona
    $urlAtual = $_SERVER[REQUEST_URI];
    $paginaAtual = substr($urlAtual, strrpos($urlAtual, '/') + 1);

    if($paginaAtual !== 'login.php') {
        header("Location: " . ROOT_FOLDER . "login.php");
    } else {
        return false;
    }
}

function login($rg, $senha) {
    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "SELECT * FROM usuario WHERE RG = " . $rg;
    $result = mysqli_query(connection(), $query);

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
            session_start();
            $_SESSION['usuario']['rg'] = $rg;
            $_SESSION['usuario']['logado'] = base64_encode(md5('sim'));
        }else {
            //Retorna para tela de login
            return sendToLogin();
        }
    }

}
/**
 * SÓ USEI ESSA FUNÇÃO EMBAIXO PRA CRIAR UMA SENHA E COLAR NO BANCO DE DADOS PQ NÃO TEMOS CADASTRO DE USUÁRIO COM SENHA AINDA, SÓ PRA TESTAR.
 */
// $teste = password_hash('123456', PASSWORD_BCRYPT); ## GERANDO UMA PASSWORD CRIPTOGRAFADA SÓ PRA INSERIR MANUALMENTE NO BANCO -> $2y$10$ELle7P61oBPuiAPOYG9XWebjGLUyKVqY9nFvQiinsfJ6o4/Dm4dHO

//Chama a função de login (Somente para teste, deve ser feito no $_POST da tela de login)
login('12345', '123456');

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


        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(nome, sobrenome, idade, RG, CPF, carteiraTrab, salario, dataContratacao, situacao) VALUES ('$nome', '$sobrenome', '$idade' ,'$rg' ,'$cpf' ,'$cart' ,'$sal' ,'$datac' ,'$situacao')";


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
    $situacao = $dados['ativo'];


    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "UPDATE $table SET nome='$nome',sobrenome='$sobrenome',idade='$idade',rg='$rg',cpf='$cpf',carteiraTrab='$cart',salario='$sal',dataContratacao='$datac',situacao='$situacao' WHERE id='$id'";


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


        //Criando a query, com o nome das colunas e valores inseridos.
        $query = "INSERT INTO $table(nome, sobrenome, idade, RG, CPF, sexo, altura, peso) VALUES ('$nome', '$sobrenome', '$idade' ,'$rg' ,'$cpf' , '$sexo', '$altura', '$peso')";

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



    //Criando a query, com o nome das colunas e valores inseridos.
    $query = "DELETE FROM $table WHERE exercicioID=$id";


    //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
    $result = mysqli_query(connection(), $query);
    if ($result) {
        echo "Delete deu certo";
    } else echo "Delete deu errado seu BURRO";
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

        var_dump($query);

        //Cria a conexão e passa a query criada e armazenada, usando também a variável da nossa conexão. Armazena tudo isso em um $result para podermos ver se deu certo ou não.
        $result = mysqli_query(connection(), $query);
        if (!$result) {
            echo "Inserção deu errado!";
        } else echo "Inserção deu certo!";
    }

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