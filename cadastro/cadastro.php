<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Cadastro de Aluno</title>
</head>
<body>

<h2>Cadastro de Aluno</h2>

<form method="POST" action="recebe_cadastro_login.php">
    <label for="nome_aluno">Nome do Aluno:</label>
    <input type="text" id="nome_aluno" name="nome_aluno"><br><br>
    
    <label for="nome_responsavel">Nome do Responsável:</label>
    <input type="text" id="nome_responsavel" name="nome_responsavel"><br><br>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="rg">RG:</label>
    <input type="text" id="rg" name="rg"><br><br>

    <label for="cpf">CPF do Responsável</label>
    <input type="text" id="cpf" name="cpf"><br><br>
    
    <label for="sexo">Sexo:</label>
    <input type="radio" id="sexo_m" name="sexo" value="m">
    <label for="sexo_m">Masculino</label>
    <input type="radio" id="sexo_f" name="sexo" value="f">
    <label for="sexo_f">Feminino</label><br><br>
    
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento"><br><br>

    
    <label for="telefone">Telefone de Contato:</label>
    <input type="text" id="telefone" name="telefone"><br><br>
    
    <label for="localizacao">Localização:</label>
    <input type="text" id="localizacao" name="localizacao"><br><br>


    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha"><br><br>
    
    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
