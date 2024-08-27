<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Atividade 17</h1>
    <div class="mt-5">
        <h2>Calcular Juros Simples</h2>
        <form method="post">
            <div class="mb-3">
                <label for="capital" class="form-label">Capital:</label>
                <input type="number" class="form-control" id="capital" name="capital" step="0.01">
            </div>
            <div class="mb-3">
                <label for="taxa" class="form-label">Taxa de Juros (%):</label>
                <input type="number" class="form-control" id="taxa" name="taxa" step="0.01">
            </div>
            <div class="mb-3">
                <label for="periodo" class="form-label">Período (anos):</label>
                <input type="number" class="form-control" id="periodo" name="periodo" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Juros</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $capital = $_POST['capital'];
                $taxa = $_POST['taxa'] / 100;
                $periodo = $_POST['periodo'];
                $juros = $capital * $taxa * $periodo;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $juros . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>