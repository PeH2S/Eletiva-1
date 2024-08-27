<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 06</h1>
    <div class="mt-5">
        <h2>Converter Celsius para Fahrenheit</h2>
        <form method="post">
            <div class="mb-3">
                <label for="celsius" class="form-label">Temperatura em Celsius:</label>
                <input type="number" class="form-control" id="celsius" name="celsius" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Converter</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $celsius = $_POST['celsius'];
                $fahrenheit = ($celsius * 9 / 5) + 32;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $fahrenheit . " °F</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>


</body>

</html>