<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once('../funcoes/categorias.php');  // Função para buscar categorias

    // Buscar todas as categorias
    $categorias = todasCategorias();
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard de Estoque</h2>

        <!-- Div onde o gráfico será renderizado -->
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>

    <!-- Inclusão da biblioteca Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Carregar a biblioteca do Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Criar um array para os dados do gráfico
            var data = google.visualization.arrayToDataTable([
                ['Categoria', 'Estoque'],
                
                <?php
                    // Iterando sobre as categorias e puxando o estoque de cada uma
                    foreach ($categorias as $categoria) {
                        // Supondo que cada categoria tem um campo 'estoque' relacionado
                        echo "['" . addslashes($categoria['nome']) . "', " . $categoria['estoque'] . "],";
                    }
                ?>
            ]);

            // Opções de customização do gráfico
            var options = {
                title: 'Estoque de Produtos por Categoria',
                hAxis: {title: 'Categoria', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'},
                colors: ['#ff9900'],  // Cor personalizada para as barras
                legend: { position: 'none' }  // Removendo a legenda
            };

            // Renderizar o gráfico na div com id 'chart_div'
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
