<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 01</title>
</head>
<body>
<main class="container">
        <h3>Número de Caracteres</h3>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <input type="text" name="valor1" class="form-control">
                </div>
                <div class="col">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $valor1 = (string) $_POST['valor1'] ?? 0;

                function ContarCaracteres(string $valor1): int{
                    return strlen($valor1);
                }
                echo "<div class='mt-3 alert alert-success'>Resultado: " . ContarCaracteres($valor1) . "</div>";
            
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        } 
        ?>
    </main>
</body>
</html>