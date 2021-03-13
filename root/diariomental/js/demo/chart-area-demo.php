<?php date_default_timezone_set('America/Sao_Paulo');
  $codigo = $_SESSION['codigousuario'];
  $consulta = $MySQLi->query("SELECT HUM_CODIGO, HUM_HUMOR, REG_DATA FROM TB_REGHUMORES JOIN TB_HUMORES ON HDR_HUM_CODIGO = HUM_CODIGO JOIN TB_REGISTROS ON REG_CODIGO = HDR_REG_CODIGO WHERE REG_USU_CODIGO =  $codigo LIMIT 12");
  $meses = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  $consulta2 = $MySQLi->query("SELECT HUM_CODIGO, HUM_HUMOR FROM TB_HUMORES ORDER BY HUM_CODIGO DESC");
?>


<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var labels = [];
var data = [];
var data_s = [];
var humores = [];

<?php while($resultado = $consulta->fetch_assoc()) {?>
  labels.push(<?php echo '"' . date('d/m/Y', strtotime($resultado["REG_DATA"])) . '"' ?>);
  data.push(<?php echo $resultado["HUM_CODIGO"]?>);
  data_s.push(<?php echo '"' . $resultado["HUM_HUMOR"] . '"'?>);
<?php }?>

<?php while($resultado2 = $consulta2->fetch_assoc()) {?>
  humores.push(<?php echo '"' . $resultado2["HUM_HUMOR"] . '"'?>);
<?php }?>

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: "Humor",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: data,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        type: "linear",
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10
  
    }
  }
});
</script>