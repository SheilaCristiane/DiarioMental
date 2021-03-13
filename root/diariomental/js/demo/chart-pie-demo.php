<?php
  $consulta = $MySQLi->query("SELECT HUM_HUMOR, COUNT(HDR_HUM_CODIGO) AS qtd_humor FROM TB_REGHUMORES JOIN TB_HUMORES ON HDR_HUM_CODIGO = HUM_CODIGO GROUP BY HDR_HUM_CODIGO");
?>

<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example  
var ctx = document.getElementById("myPieChart");
var labels = [];
var data = [];
<?php while($resultado = $consulta->fetch_assoc()) {?>
  labels.push(<?php echo '"' . $resultado["HUM_HUMOR"] . '"' ?>);
  data.push(<?php echo $resultado["qtd_humor"]?>);
<?php }?>

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: labels,
    datasets: [{
      data: data,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc',  '#66CDAA', '#00A4CD', '#E32636', '#FFFF00', '#ECDB00', '#ADFF2F', '#6A5ACD', '#ADD8E6', '#808000'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>