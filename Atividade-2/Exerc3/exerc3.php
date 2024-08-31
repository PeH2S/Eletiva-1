<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atividade 3</title>
</head>
<body>
<h1>Atividade 03</h1>
    <div class="container mt-5">
        <h2></h2>
        <form method="POST">
            <div class="mb-3">
                <label for="num1" class="form-label">Número 1:</label>
                <input type="number" class="form-control" id="num1" name="a">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Número 2:</label>
                <input type="number" class="form-control" id="num2" name="b">
            </div>
            <button type="submit" class="btn btn-primary">Somar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $num1 = $_POST['a'];
                $num2 = $_POST['b'];
                if ($num1 < $num2)
                {
                    echo "<div class='mt-3 alert alert-success'>Resultado: " . ($num1) .", ". ($num2) . "</div>";
                }
                else if ($num1 > $num2)
                {
                    echo "<div class='mt-3 alert alert-success'>Resultado: " . ($num2) .", ". ($num1) . "</div>";
                }
                else
                {
                    echo "<div class='mt-3 alert alert-success'>Resultado: Números = " . ($num1) . "</div>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>