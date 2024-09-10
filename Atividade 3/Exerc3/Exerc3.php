<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Atividade 03</title>
</head>
<body>
<div class="container">
        <h3>Palavra contida em Outra</h3>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <input type="text" name="valor1" class="form-control" placeholder="Digite a primeira palavra" >
                </div>
                <div class="col">
                    <input type="text" name="valor2" class="form-control" placeholder="Digite a segunda palavra" >
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $primeiraPalavra = $_POST['valor1'];

                $segundaPalavra = $_POST['valor2'];  

                // Função para verificar se a segunda palavra está contida na primeira
                function verificarPalavra($primeiraPalavra, $segundaPalavra) {
                    return strpos($primeiraPalavra, $segundaPalavra) !== false; 
                    // A função strpos em PHP é usada para encontrar a posição da primeira ocorrência de uma substring dentro de uma string. Se a substring for encontrada, a função retorna a posição (índice) da sua primeira ocorrência. Caso contrário, ela retorna false.
                }

                if (verificarPalavra($primeiraPalavra, $segundaPalavra)) {
                    echo "<div class='alert alert-success mt-3'>A palavra '$segundaPalavra' está contida em '$primeiraPalavra'.</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>A palavra '$segundaPalavra' NÃO está contida em '$primeiraPalavra'.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='mt-3 alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>