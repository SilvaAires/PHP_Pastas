<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $matricula = $_POST["matricula"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $idade = $_POST["idade"];
        $curso = $_POST["curso"];

        // Chama a função para verificar a idade do aluno
        exe09_verificarIdade($idade);
    } else {
        // Se os dados não foram enviados pelo formulário, redireciona de volta para o formulário
        header("Location: index.html");
        exit();
    }
?>
