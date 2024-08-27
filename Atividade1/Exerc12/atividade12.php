<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <h1>Atividade 12</h1>
    <div class="mt-5">
        <h2>Calcular Potência</h2>
        <form method="post">
            <div class="mb-3">
                <label for="base" class="form-label">Base:</label>
                <input type="number" class="form-control" id="base" name="base" step="0.01">
            </div>
            <div class="mb-3">
                <label for="expoente" class="form-label">Expoente:</label>
                <input type="number" class="form-control" id="expoente" name="expoente" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Potência</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $base = $_POST['base'];
                $expoente = $_POST['expoente'];
                $resultado = pow($base, $expoente);
                echo "<div class='alert alert-success mt-3'>Resultado: " . $resultado . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>