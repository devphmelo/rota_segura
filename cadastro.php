<?php
// Conectar ao banco de dados MySQL
$host = "localhost"; // Ou o IP do servidor MySQL
$dbname = "rota_segura";
$username = "root"; // Usuário do MySQL
$password = "Phmelo1620*"; // Senha do MySQL

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar e sanitizar os dados
    $nome = $conn->real_escape_string($_POST["nome"]);
    $data_nascimento = $conn->real_escape_string($_POST["data_nascimento"]);
    $email = $conn->real_escape_string($_POST["login"]);
    $senha = password_hash($conn->real_escape_string($_POST["senha"]), PASSWORD_DEFAULT); // Criptografar a senha

    // SQL para inserir os dados
    //INSERT INTO usuario (nome, data_nascimento, login, senha)
            //VALUES ('teste', '2000-01-01', 'login.usuario', '123456');
    $sql = "INSERT INTO usuario (nome, data_nascimento, login, senha)
            VALUES ('$nome', '$data_nascimento', '$login', '$senha')";

    // Executar a query
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
