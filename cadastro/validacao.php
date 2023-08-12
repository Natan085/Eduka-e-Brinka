<?php
function validarCPF($cpf) {
    // Remover caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verificar se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verificar CPFs com dígitos iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Algoritmo de validação do CPF
    for ($i = 9, $j = 0, $soma = 0; $i > 0; $i--, $j++) {
        $soma += $cpf[$j] * $i;
    }

    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;

    for ($i = 10, $j = 0, $soma = 0; $i > 1; $i--, $j++) {
        $soma += $cpf[$j] * $i;
    }

    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;

    if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
        return false;
    }

    return true;
}
function validarRG($rg) {
    // Remover caracteres não numéricos
    $rg = preg_replace('/[^0-9]/', '', $rg);

    // Verificar se o RG tem 9 dígitos
    if (strlen($rg) != 9) {
        return false;
    }

    return true;
}
// validacao.php
function validarSenha($senha) {
    // Verificar se a senha tem pelo menos 8 caracteres
    if (strlen($senha) < 8) {
        return false;
    }

    return true;
}

?>
