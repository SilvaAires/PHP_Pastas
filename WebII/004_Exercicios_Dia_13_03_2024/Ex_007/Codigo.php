<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $rendaMensal = $_POST["rendaMensal"];

    // Calcula o imposto de renda
    $imposto = exe07_calcularImpostoRenda($rendaMensal);

    // Exibe o resultado
    echo "Nome: $nome <br>";
    echo "CPF: $cpf <br>";
    echo "Renda Mensal: R$ $rendaMensal <br>";
    echo "Imposto de Renda a pagar: R$ $imposto";
?>