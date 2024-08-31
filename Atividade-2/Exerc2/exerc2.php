<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atividade 2</title>
</head>
<body>
<h1>Atividade 02</h1>
    <div class="container mt-5">
        <h2>Somar Números e Retornar Triplo</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="num1" class="form-label">Número 1:</label>
                <input type="number" class="form-control" id="num1" name="num1">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Número 2:</label>
                <input type="number" class="form-control" id="num2" name="num2">
            </div>
            <button type="submit" class="btn btn-primary">Somar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                if ($num1 == $num2)
                {
                    $soma = $num1 + $num2;

                    echo "<div class='mt-3 alert alert-success'>Resultado: " . ($soma * 3) . "</div>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        } 
        ?>
    </div>
</body>
</html>