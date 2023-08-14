<?php
require 'conexao.php'; // Inclua o arquivo de conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    
    // Consultar o banco de dados para verificar o CPF e a senha
    $sql = "SELECT id FROM aluno WHERE cpf = ? AND senha = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $cpf, $senha);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Login realizado com sucesso!";
            // Aqui você pode redirecionar o usuário para a página após o login
        } else {
            echo "CPF ou senha inválidos!";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação do statement: " . $mysqli->error;
    }
}

// Fechar a conexão
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST" action="login.php">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf"><br><br>
    
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha"><br><br>
    
    <input type="submit" value="Entrar">
</form>

</body>
</html>
