<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 13</h1>
    <div class="mt-5">
        <h2>Converter Metros para Centímetros</h2>
        <form method="post">
            <div class="mb-3">
                <label for="metros" class="form-label">Valor em Metros:</label>
                <input type="number" class="form-control" id="metros" name="metros" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Converter</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $metros = $_POST['metros'];
                $centimetros = $metros * 100;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $centimetros . " cm</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>