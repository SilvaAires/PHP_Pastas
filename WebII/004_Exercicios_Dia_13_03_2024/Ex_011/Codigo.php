<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $url = $_POST["url"];
        $alt = isset($_POST["alt"]) ? $_POST["alt"] : "";
        $height = isset($_POST["height"]) ? $_POST["height"] : "";
        $width = isset($_POST["width"]) ? $_POST["width"] : "";

        // Chama a função para exibir a imagem
        exe11_exibirImagem($url, $alt, $height, $width);
    } else {
        // Se os dados não foram enviados pelo formulário, redireciona de volta para o formulário
        header("Location: index.php");
        exit();
    }
?>
