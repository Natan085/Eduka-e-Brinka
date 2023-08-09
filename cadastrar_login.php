<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de Login</title>
</head>
<body>

<h2>Cadastro de Login</h2>

<form method="POST" action="recebe_cadastro_login.php">
    <label for="cpf_responsavel">CPF do Responsável:</label>
    <input type="text" id="cpf_responsavel" name="cpf_responsavel"><br><br>
    
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha"><br><br>
    
    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
