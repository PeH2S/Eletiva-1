<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atividade 5</title>
</head>
<body>
<h1>Atividade 05</h1>
    <div class="container mt-5">
        <h2>Apresentar Meses Correspondentes</h2>
        <form method="POST">
            <div class="mb-3">
                <p>1 - Janeiro</p>
                <p>2 - Fevereiro</p>
                <p>3 - Março</p>
                <p>4 - Abril</p>
                <p>5 - Maio</p>
                <p>6 - Junho</p>
                <p>7 - Julho</p>
                <p>8 - Agosto</p>
                <p>9 - Setembro</p>
                <p>10 - Outubro</p>
                <p>11 - Novembro</p>
                <p>12 - Dezembro</p>
            </div>
            <div class="mb-3">
                <label for="num1" class="form-label">Número:</label>
                <input type="number" class="form-control" id="num1" name="num">
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $num = $_POST['num'];
                
                switch ($num)
                {
                    case 1:
                        echo "<div class='mt-3 alert alert-success'>Mês: 1 - Janeiro"  . "</div>";
                        break;
                    case 2:
                        echo "<div class='mt-3 alert alert-success'>Mês: 2 - Fevereiro"  . "</div>";
                        break;
                    case 3:
                        echo "<div class='mt-3 alert alert-success'>Mês: 3 - Março"  . "</div>";
                        break;
                    case 4:
                        echo "<div class='mt-3 alert alert-success'>Mês: 4 - Abril"  . "</div>";
                        break;
                    case 5:
                        echo "<div class='mt-3 alert alert-success'>Mês: 5 - Maio"  . "</div>";
                        break;
                    case 6:
                        echo "<div class='mt-3 alert alert-success'>Mês: 6 - Junho"  . "</div>";
                        break;
                    case 7:
                        echo "<div class='mt-3 alert alert-success'>Mês: 7 - Julho"  . "</div>";
                        break;
                    case 8:
                        echo "<div class='mt-3 alert alert-success'>Mês: 8 - Agosto"  . "</div>";
                        break;
                    case 9:
                        echo "<div class='mt-3 alert alert-success'>Mês: 9 - Setembro"  . "</div>";
                        break;
                    case 10:
                        echo "<div class='mt-3 alert alert-success'>Mês: 10 - Outubro"  . "</div>";
                        break;
                    case 11:
                        echo "<div class='mt-3 alert alert-success'>Mês: 11 - Novembro"  . "</div>";
                        break;
                    case 12:
                        echo "<div class='mt-3 alert alert-success'>Mês: 12 - Dezembro"  . "</div>";
                        break;
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>