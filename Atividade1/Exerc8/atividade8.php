<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 08</h1>
    <div class="mt-5">
        <h2>Calcular Área do Retângulo</h2>
        <form method="post">
            <div class="mb-3">
                <label for="largura" class="form-label">Largura:</label>
                <input type="number" class="form-control" id="largura" name="largura" step="0.01">
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura:</label>
                <input type="number" class="form-control" id="altura" name="altura" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Área</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $largura = $_POST['largura'];
                $altura = $_POST['altura'];
                $area = $largura * $altura;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $area . " m²</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>