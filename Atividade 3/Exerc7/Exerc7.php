<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 07</title>
</head>

<body>
    <div class="container mt-5">
        <h3>Calcular Diferença entre Datas</h3>
        <form method="POST">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="data1" class="form-control" placeholder="Data 1 (dd/mm/YYYY)">
                </div>
                <div class="col">
                    <input type="text" name="data2" class="form-control" placeholder="Data 2 (dd/mm/YYYY)">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Calcular Diferença</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $data1 = (string) $_POST['data1'] ?? 0;
                $data2 = (string) $_POST['data2'] ?? 0;

                function converterData(string $data): string|bool
                {
                    $partes = explode('/', $data);
                    if (count($partes) == 3) {
                        return $partes[2] . '-' . $partes[1] . '-' . $partes[0];
                    }
                    return false;
                }

                $data1Formatada = converterData($data1);
                $data2Formatada = converterData($data2);

                if ($data1Formatada && $data2Formatada) {

                    $date1 = new DateTime($data1Formatada);
                    $date2 = new DateTime($data2Formatada);

                    $diferenca = $date1->diff($date2); // diff() e exibe a diferença em dias diretamente.


                    echo "<p class='alert alert-success mt-3'>A diferença entre as datas é de " . $diferenca->days . " dias.</p>";
                } else {
                    echo "<p class='alert alert-danger mt-3'>Formato de data inválido. Use dd/mm/YYYY.</p>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>

</html>