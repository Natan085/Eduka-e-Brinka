<?php
require 'conexao.php'; // Inclua o arquivo de conexão ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_or_email = $_POST["id_or_email"];
    $senha = $_POST["senha"];
    
    // Consultar o banco de dados para verificar o ID ou e-mail e a senha
    $sql = "SELECT id FROM aluno WHERE (id = ? OR email = ?) AND senha = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $id_or_email, $id_or_email, $senha);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Login realizado com sucesso!";
            // Aqui você pode redirecionar o usuário para a página após o login
        } else {
            echo "ID ou senha inválidos!";
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
    <label for="id_or_email">ID ou E-mail:</label>
    <input type="text" id="id_or_email" name="id_or_email"><br><br>
    
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha"><br><br>
    
    <input type="submit" value="Entrar">
</form>

</body>
</html>
