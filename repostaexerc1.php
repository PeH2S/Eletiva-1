<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta Exerc 1</title>
</head>
<body>
    <?php
        $menor_valor = PHP_INT_MAX;
        $pos_menor_valor = 0;
        for ($i=1; $i<=7; $i++)
        {
            $valor = $_POST["valor$i"];
            echo $valor."<br/>";
        }
    ?>
</body>
</html>