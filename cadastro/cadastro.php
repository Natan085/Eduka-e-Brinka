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
    
    <label for="sexo">Sexo:</label>
    <input type="radio" id="sexo_m" name="sexo" value="m">
    <label for="sexo_m">Masculino</label>
    <input type="radio" id="sexo_f" name="sexo" value="f">
    <label for="sexo_f">Feminino</label><br><br>
    
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" id="data_nascimento" name="data_nascimento"><br><br>
    
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="1">Ativo</option>
        <option value="0">Inativo</option>
    </select><br><br>
    
    <label for="telefone">Telefone de Contato:</label>
    <input type="text" id="telefone" name="telefone"><br><br>
    
    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade"><br><br>
    
    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado"><br><br>
    
    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep"><br><br>
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha"><br><br>
    
    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
