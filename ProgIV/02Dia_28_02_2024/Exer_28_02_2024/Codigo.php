<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
    $us = $_POST["n1"];
    $txt = strtoupper($_POST["txt"]);
    $pc = rand(0, 5);

    if(($pc + $us) % 2 == 0){
        if($txt == "PAR"){
            echo ("Venceu o User!");
            //echo ("<img src='imagem/{$us}.png' alt='Par'>");
        }else{
            echo ("Venceu a máquina!");
            //echo ("<img src='imagem/{$pc}.png' alt='Par'>");
        }
    }else{
        if(($pc + $us) % 2 != 0){
            if($txt == "IMPAR"){
                echo ("Venceu o User!");
                //echo ("<img src='imagem/{$us}.png' alt='Impar'>");
            }else{
                echo ("Venceu a máquina!");
                //echo ("<img src='imagem/{$pc}.png' alt='Impar'>");
            }
        }
    }
    //echo ("<br>".$us." -- ".$pc);
    //echo ("<img src='imagem/{$us}.png' alt='Impar'>");
    //echo ("<img src='imagem/{$pc}.png' alt='Impar'>");
    echo "<div style='text-align: center;'>";
    echo "<br>$us -- $pc";
    echo "</div>";
    echo "<div style='display: flex; justify-content: center;'>";
    echo "<div>";
    echo "<img src='imagem/{$us}.png' alt='Impar'>";
    echo "</div>";
    echo "<div>";
    echo "<img src='imagem/{$pc}.png' alt='Impar'>";
    echo "</div>";
    echo "</div>";
?>
    
</body>
</html>