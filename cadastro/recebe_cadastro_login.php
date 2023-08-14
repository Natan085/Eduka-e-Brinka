<?php
require 'conexao.php'; // Inclua o arquivo de conexão ao banco de dados
require 'validacao.php'; // Inclua o arquivo de validação

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_aluno = $_POST["nome_aluno"];
    $nome_responsavel = $_POST["nome_responsavel"];
    $email = $_POST["email"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $sexo = $_POST["sexo"];
    $data_nascimento = $_POST["data_nascimento"];
    $telefone = $_POST["telefone"];
    $localizacao = $_POST["localizacao"];
    $senha = $_POST["senha"];
    
    // Validar dados conforme necessário
    if (empty($nome_aluno) || empty($nome_responsavel) || empty($email) || empty($rg) || empty($sexo) || empty($data_nascimento) || empty($telefone) || empty($localizacao) || empty($senha)) {
        echo "Todos os campos devem ser preenchidos!";
    } elseif (!validarRG($rg)) {
        echo "RG inválido!";
    } elseif (!validarSenha($senha)) {
        echo "A senha deve conter pelo menos 8 caracteres!";
    } else {
        // Preparar a instrução SQL de inserção com prepared statement
        $sql = "INSERT INTO aluno (nome_aluno, nome_responsavel, email, rg, cpf, sexo, data_nascimento, telefone, localizacao, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssssssss", $nome_aluno, $nome_responsavel, $email, $rg, $cpf, $sexo, $data_nascimento, $telefone, $localizacao, $senha);

            if ($stmt->execute()) {
                $id_crianca = $stmt->insert_id; // Obtém o ID gerado para a criança
                echo "Cadastro realizado com sucesso! Seu ID de acesso é: $id_crianca";
            } else {
                echo "Erro na inserção: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação do statement: " . $mysqli->error;
        }
    }
}

// Fechar a conexão
$mysqli->close();
?>
