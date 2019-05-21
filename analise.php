<?php
session_start();
include_once("conexaoPesquisa.php");
?>


<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <body>
    <?php require_once "index.php"; ?>
    <br>

    <?php 
     
      $lista = array();
      $devia = array();
      $cor= array(); 
      
      $cor[0] = '#76A7FA';
      $cor[1] = '#silver';
      $cor[2] = '#gold';
      $cor[3] = '#e5e4e2';
      $cor[4] = '#e5e4e2';
      $i = 0;
      $sql = "SELECT b.codigo_beneficiario, t.deviaOntem from beneficiario b, tupperware t where b.idBeneficiario = t.idBeneficiario order by t.deviaOntem desc";
      $resultado = $conn->query($sql);
      while ($row = mysqli_fetch_object($resultado)) {

        $codigo_beneficiario = $row->codigo_beneficiario;
        $deviaOntem = $row->deviaOntem;
        $lista[$i] = $codigo_beneficiario;
        $devia[$i] = $deviaOntem;
        $i = $i + 1;
      }
    ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Número de tuppware em falta", { role: "style" } ],
              
        <?php
        $k = 5;
        for ($i= 0; $i < $k; $i++) {
        ?>

            ['<?php echo $lista[$i] ?>', <?php arsort($devia); echo $devia[$i]; ?>, '<?php echo $cor[$i] ?>'],        

        <?php } ?>
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Beneficiários com mais tupperware em falta",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

    

  <div id="columnchart_values" style="width: 50%; float: right; padding: 5px;"></div>

     <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['F3',     50],
          ['F2',      20],
          ['F8',  20],
          ['F4', 10],
          ['F1',    7]
          //['<?php $codigo_fonte ?>', <?php $contador?>],        

      ]);
        var options = {
          title: 'Fontes',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
</head>
  <body>
  <div id="donutchart" style="width: 50%; height: 50%; padding: 5px; "></div>
  </body>
</html>
