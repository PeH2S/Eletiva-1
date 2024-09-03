<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <h1>Atividade 04</h1>
    <div class="container mt-5">
        <h2>Dividir Números</h2>
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label">Número 1:</label>
                <input type="number" class="form-control" id="num1" name="num1">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Número 2:</label>
                <input type="number" class="form-control" id="num2" name="num2">
            </div>
            <button type="submit" class="btn btn-primary">Dividir</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                if ($num2 == 0) {
                    echo "Divisão por zero não permitida.";
                }
                echo "<div class='mt-3 alert alert-success'>Resultado: " . ($num1 / $num2) . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>


</body>

</html>