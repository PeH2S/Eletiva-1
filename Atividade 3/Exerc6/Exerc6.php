<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 06</title>
</head>
<body>
<div class="container">
        <h3>Arredondando Números</h3>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <input type="number" name="valor1" class="form-control" placeholder="Digite um número" step="any" >
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Arredondar</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try{
                $numero = $_POST['valor1'];
        
                $numeroArredondado = round($numero);
        
                echo "<p class='alert alert-success mt-3'>O número arredondado é: $numeroArredondado</p>";
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        
        ?>
</div>
</body>
</html>