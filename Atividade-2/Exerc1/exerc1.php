<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="repostaexerc1.php" method="POST">
        <?php
            for ($i=1; $i<=7; $i++)
            { ?>
                <input type='number' name='valor<?= $i?>'>

            <?php   } ?>
            <button type="submit">Enviar</button>
    </form>
</body>
</html>