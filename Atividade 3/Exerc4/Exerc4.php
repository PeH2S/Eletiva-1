<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 04</title>
</head>
<body>
<div class="container">
        <h3>Verificação de Data</h3>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <input type="number" name="dia" class="form-control" placeholder="Dia" >
                </div>
                <div class="col">
                    <input type="number" name="mes" class="form-control" placeholder="Mês" >
                </div>
                <div class="col">
                    <input type="number" name="ano" class="form-control" placeholder="Ano" >
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $dia = (int) $_POST['dia'] ?? 0;
                $mes = (int) $_POST['mes'] ?? 0;
                $ano = (int) $_POST['ano'] ?? 0;
        
                function VerificarData(int $dia, int $mes, int $ano): bool {
                    return checkdate($mes, $dia, $ano);
                }
        
                function FormatarData(int $dia, int $mes, int $ano): string {
                    return sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
                }
        
                // Verifica se a data é válida
                if (VerificarData($dia, $mes, $ano)) {
                    // Formata a data no formato dd/mm/YYYY
                    $dataFormatada = FormatarData($dia, $mes, $ano);
                    echo "<p class='alert alert-success mt-3'>Data válida: $dataFormatada</p>";
                } else {
                    echo "<p class='alert alert-danger mt-3'>Data inválida!</p>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
