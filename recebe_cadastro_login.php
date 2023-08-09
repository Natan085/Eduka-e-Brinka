<?php
require 'conexao.php';
require 'validacao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_aluno = $_POST["nome_aluno"];
    $nome_responsavel = $_POST["nome_responsavel"];
    $email = $_POST["email"];
    $rg = $_POST["rg"];
    $sexo = $_POST["sexo"];
    $data_nascimento = $_POST["data_nascimento"];
    $status = $_POST["status"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    
    // Validar dados conforme necessário
    if (empty($nome_aluno) || empty($nome_responsavel) || empty($email) || empty($rg) || empty($sexo) || empty($data_nascimento) || empty($status) || empty($telefone) || empty($cidade) || empty($estado) || empty($cep)) {
        echo "Todos os campos devem ser preenchidos!";
    } elseif (!validarCPF($rg)) {
        echo "RG inválido!";
    } elseif (!validarSenha($_POST["senha"])) {
        echo "A senha deve conter pelo menos 8 caracteres!";
    } else {
        // Preparar a instrução SQL de inserção
        $sql = "INSERT INTO aluno (nome_aluno, nome_responsavel, email, rg, sexo, data_nascimento, status, telefone, cidade, estado, cep) 
                VALUES ('$nome_aluno', '$nome_responsavel', '$email', '$rg', '$sexo', '$data_nascimento', '$status', '$telefone', '$cidade', '$estado', '$cep')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro na inserção: " . $conn->error;
        }
    }
}

// Fechar a conexão
$conn->close();
?>
