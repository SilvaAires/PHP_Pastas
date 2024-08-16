<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assentos do Ônibus</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            width: 50px;
            height: 50px;
        }
        .disponivel {
            background-color: #90EE90; /* Verde claro */
        }
        .ocupado {
            background-color: #FF6347; /* Vermelho tomate */
        }
        .corredor {
            background-color: #F0F0F0; /* Cinza claro */
        }
    </style>
</head>
<body>
    <h1>Assentos do Ônibus</h1>
    <table>
        <?php for ($i=0; $i <5 ; $i++):?>
        <tr>
            <td class="disponivel"><?php echo $i;?></td>
            <td class="corredor"><?php echo $i;?></td>
            <td class="disponivel"><?php echo $i;?></td>
        </tr>
        <?php endfor?>
    </table>
</body>
</html>
