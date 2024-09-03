<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atividade 7</title>
</head>
<body>
<h1>Atividade 07</h1>
    <div class="container mt-5">
        <h2>Incrementando e somando</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="num1" class="form-label">Informe o número:</label>
                <input type="number" class="form-control" id="num1" name="num1">
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $num1 = $_POST['num1'];
                $i = 1;
                $soma = 0;
                while ($i <= $num1)
                {
                    $soma += $i;
                    $i++;
                }
                echo "<div class='mt-3 alert alert-success'>Resultado: " . $soma . "</div>";
                
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>