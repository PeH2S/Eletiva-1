<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
   
    <h1>Atividade 20</h1>
    <div class="mt-5">
        <h2>Calcular Velocidade Média</h2>
        <form method="post">
            <div class="mb-3">
                <label for="distancia" class="form-label">Distância (km):</label>
                <input type="number" class="form-control" id="distancia" name="distancia" step="0.01">
            </div>
            <div class="mb-3">
                <label for="tempo" class="form-label">Tempo (horas):</label>
                <input type="number" class="form-control" id="tempo" name="tempo" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Velocidade</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $distancia = $_POST['distancia'];
                $tempo = $_POST['tempo'];
                if ($tempo == 0) {
                    echo "O tempo não pode ser zero.";
                }
                $velocidade = $distancia / $tempo;
                echo "<div class='alert alert-success mt-3'>Resultado: " . $velocidade . " km/h</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>


</body>

</html>