<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try{
                $valor = $_POST['valor'];
                //Funções de String
                $qtd_caracteres = strlen($valor);
                echo "<p>Quantidade de caracteres $qtd_caracteres</p>";
                $maiusculo = strtoupper($valor);
                $minusculo = strtolower($valor);
                echo "<p>Maiúsculo: $maiusculo</p>";
                echo "<p>Minúsculo: $minusculo</p>";
                //Funções de Data
                $dia = 30;
                $mes = 2;
                $ano = 2024; 

                if (checkdate($mes, $dia, $ano)){
                    echo "<p>Data Válida!</p>";
                } else{
                    echo "<p>Data Invalida!</p>";
                }

                //Funções Númericas
                $menor = min(1, 2, 3, 4, 5);
                $maior = max(1, 2, 3, 4, 5);
                echo "<p>Menor valor: $menor</p>";
                echo "<p>Maior valor: $maior</p>";
                
                $aleatorio = rand(1, 100);
                echo "<p>Aleatório: $aleatorio</p>";

                $numero = 1567.98;
                $moeda = number_format($numero, 2, ",", ".");
                echo "<p>Moeda: R$$moeda</p>";
            } catch (Exception $e) {
                echo "Erro ".$e->getMessage();
            }
        }
    ?>
</body>
</html>