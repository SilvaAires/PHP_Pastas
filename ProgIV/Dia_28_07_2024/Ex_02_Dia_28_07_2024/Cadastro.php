<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envia dados</title>
</head>
<body>
    <form action="Cadastro.php" method="post">
        Raio: <input type="number" name="raio"><br>
        <input type="submit" value="Calcular"><br>
    </form>
    <?php
        if((isset($_POST["raio"])) && ($_POST["raio"] != null)){
            define( "pi",3.14);

            $raio = $_POST["raio"];
            $area = pi*$raio*$raio;
    
            echo ("". $raio ."<br><br>". $area ."");
        }
    ?>
</body>
</html>

