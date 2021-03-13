<?php include ("template-top.php"); ?>
<div class="row">
	<div class="col-xl-7 col-lg-6" style="left: 4%;">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Níveis de humor durante os últimos meses</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <br>
                <div>
                    <small> Legenda dos humores: 1 = feliz; 2 = triste; 3 = cansado; 4 = ansioso; 5 = calmo; 6 = confuso; 7 = estranho; 8 = com medo; 9 = com raiva; 10 = entediado; 11 = estressado; 12 = outro.</small>
                </div>
            </div>
            <div class="card-footer py-3">
                <p style="text-align: justify;">
                    No gráfico acima exibido, tem-se a variação de humores registrados por você nestes últimos tempos. É interessante que frequente - ou comece a frenquentar - a terapia a fim de que tal gráfico não apresente tantos pontos ruins, por mais que - neste momento - ele possa não estar de todo ruim. Ah, caso você já tenha acompanhamento com um/uma psicólogo/a, aproveite este grafico e use dele para que este profissional veja como você tem andado. Cuidar da sua saúde mental é essencial. Tire um tempo para si, pratique o autocuidado e não se sobrecarregue.  
                </p>
            </div>
        </div>
    </div>
    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-4" style="left: 4%;">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Frequência de humores</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
            <div class="card-footer py-3">
                <p style="text-align: justify;">
                    Neste gráfico, por sua vez, temos o conjunto dos humores registrados por todos os nossos usuários, quantitativamente. 
                </p>
            </div>
        </div>
    </div>
</div>
<?php include ("template-bottom.php"); ?>