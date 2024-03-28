<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';
    
    $cpf = $_POST["n1"]; // Insira o CPF a ser validado aqui
    if (exe06_validaCPF($cpf)) {
        echo "<h1>CPF válido.</h1>";
    } else {
        echo "<h1>CPF inválido.</h1>";
    }
?>