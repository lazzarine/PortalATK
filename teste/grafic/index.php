<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <title>Chart.js - criando gráficos com a biblioteca Chart.js</title>

        <script src="Chart.min.js"></script>

        <style type="text/css">
            .container {
                width: 100%;
                margin: auto;
            }


        </style>  
    </head>

    <body>    


        <div class="container">
            <h2>Chart.js — Bar Chart Demo</h2>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <script>

            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php
                                // abrir ficheiro csv em modo de leitura
                                $handle = fopen('srt50.csv', "r");
                                // obter os dados em cada linha
                                $i = 0;
                                while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                    if ($i > 0 and $i < 54):
                                        $data[3] = str_replace(",", "", $data[3]);
                                        echo '"' . trim($data[3]) . '",';
                                    endif;
                                    $i ++;
                                }
                                // fechar o ficheiro csv
                                fclose($handle);
                                ?>],
                    datasets: [{
                            label: 'Venda Diária dos Setores',
                            data: [<?php
                                    // abrir ficheiro csv em modo de leitura
                                    $handle = fopen('srt50.csv', "r");
                                    // obter os dados em cada linha
                                    $i = 0;
                                    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                                        if ($i > 0 and $i < 54):
                                            $data[10] = str_replace(".", "", $data[10]);
                                            echo '"' . round(str_replace(",", ".", $data[10])) . '",';
                                        endif;
                                        $i ++;
                                    }
                                    // fechar o ficheiro csv
                                    fclose($handle);
                                    ?>],
                            backgroundColor: "rgba(153,255,51,0.5)",
                            borderColor: "rgba(153,255,51,1)"
                        }]
                }
            });
        </script>

    </body>

</html>

