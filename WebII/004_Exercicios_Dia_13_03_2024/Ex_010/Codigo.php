<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $linhas = $_POST["linhas"];
        $colunas = $_POST["colunas"];
        $conteudo = $_POST["conteudo"];

        exe10_criarTabela($linhas, $colunas, $conteudo);
    } else {
        header("Location: index.php");
        exit();
    }
?>
