<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 05</title>
</head>
<body>
<div class="container">
        <h3>Calculado Raiz Quadrada</h3>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <input type="number" name="valor1" class="form-control" placeholder="Digite um número: ">
                </div>
                <div class="col">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try{

                $numero = (float) $_POST['valor1'] ?? 0;

                function CalcularRaiz(float $numero): float{
                    return sqrt($numero);
                }

                if ($numero >= 0) {
                    // Calcula a raiz quadrada utilizando a função sqrt()
                    
                    echo "<p class='alert alert-success mt-3'>A raiz quadrada de $numero é: ".CalcularRaiz($numero)."</p>";
                } else {
                    echo "<p class='alert alert-danger mt-3'>Não é possível calcular a raiz quadrada de um número negativo.</p>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>