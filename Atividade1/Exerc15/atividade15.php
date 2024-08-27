<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 15</h1>
    <div class="mt-5">
        <h2>Calcular IMC</h2>
        <form method="post">
            <div class="mb-3">
                <label for="peso" class="form-label">Peso (kg):</label>
                <input type="number" class="form-control" id="peso" name="peso" step="0.01">
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura (m):</label>
                <input type="number" class="form-control" id="altura" name="altura" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular IMC</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];
                if ($altura == 0) {
                    throw new Exception("A altura não pode ser zero.");
                }
                $imc = $peso / pow($altura, 2);
                echo "<div class='alert alert-success mt-3'>Resultado: " . number_format($imc, 2) . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>