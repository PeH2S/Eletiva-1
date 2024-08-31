<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 05</h1>
    <div class="mt-5">
        <h2>Calcular Média de Três Notas</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nota1" class="form-label">Nota 1:</label>
                <input type="number" class="form-control" id="nota1" name="nota1" step="0.01">
            </div>
            <div class="mb-3">
                <label for="nota2" class="form-label">Nota 2:</label>
                <input type="number" class="form-control" id="nota2" name="nota2" step="0.01">
            </div>
            <div class="mb-3">
                <label for="nota3" class="form-label">Nota 3:</label>
                <input type="number" class="form-control" id="nota3" name="nota3" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Média</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
                $nota3 = $_POST['nota3'];
                $media = ($nota1 + $nota2 + $nota3) / 3;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $media . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>

</body>

</html>