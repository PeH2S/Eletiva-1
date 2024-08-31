<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atividade 4</title>
</head>
<body>
<h1>Atividade 04</h1>
    <div class="container mt-5">
        <h2>Aplicando Desconto</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="num1" class="form-label">Número 1:</label>
                <input type="number" step="0.01" class="form-control" id="num1" name="num1">
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $num1 = $_POST['num1'];
                
                if ($num1 > 100)
                {
                    $porcent = 15 / 100;
                    $desconto = $num1 * $porcent;
                    $valorFinal = $num1 - $desconto;

                    echo "<div class='mt-3 alert alert-success'>Resultado: Valor com desconto: " . number_format($valorFinal, 2) . "</div>";
                }
                else
                {
                    echo "<div class='mt-3 alert alert-success'>Resultado: Valor: " . number_format($num1, 2) . "</div>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>