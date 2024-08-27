<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eletiva-PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <h1>Atividade 16</h1>
    <div class="mt-5">
        <h2>Calcular Preço com Desconto</h2>
        <form method="post">
            <div class="mb-3">
                <label for="preco" class="form-label">Preço Original:</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01">
            </div>
            <div class="mb-3">
                <label for="desconto" class="form-label">Percentual de Desconto:</label>
                <input type="number" class="form-control" id="desconto" name="desconto" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Calcular Preço com Desconto</button>
        </form>

        <?php
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $preco = $_POST['preco'];
                $desconto = $_POST['desconto'];
                $preco_com_desconto = $preco - ($preco * ($desconto / 100));
                echo "<div class='alert alert-success mt-3'>Resultado: " . $preco_com_desconto . "</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger mt-3'>Erro: " . $e->getMessage() . "</div>";
        }
        ?>
    </div>
    <br>

</body>

</html>