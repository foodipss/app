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
    <?php require_once "indexVoluntario.php"; ?>
    <br>

    <?php 

      $codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
      $resultado_row_beneficiario = "SELECT * from beneficiario where codigo_beneficiario ='$codigo_beneficiario'";
      $resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
      $row_row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
    
      $result_row_tupperware = "SELECT b.nome, b.telefone, t.quantidadeLevou, t.quantidadeEntregue, t.isRecolha, t.data from beneficiario b, tupperware t where b.codigo_beneficiario ='$codigo_beneficiario' and b.idBeneficiario = t.idBeneficiario order by t.idTupperware desc";
      $resultado_row_tupperware = mysqli_query($conn, $result_row_tupperware) or die(mysqli_error($conn));
      $resultado = mysqli_query($conn, "SELECT sum(quantidadeLevou), sum(quantidadeEntregue) from beneficiario b, tupperware t where b.codigo_beneficiario ='$codigo_beneficiario' and b.idBeneficiario = t.idBeneficiario order by t.idTupperware desc");
        //$linhas = mysqli_num_rows($resultado);
 
      $maiorNumero = 0;
        while($linhas = mysqli_fetch_array($resultado)){   
        $maiorNumero = $linhas["sum(quantidadeLevou)"] - $linhas["sum(quantidadeEntregue)"];          
        };
    ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["B12", <?php echo $maiorNumero; ?>, "color: #76A7FA"],
        ["B2", 10.49, "silver"],
        ["B42", 19.30, "gold"],
        ["B6", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Beneficiários mais em falta",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  
</head>
  <body>
  <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
  </body>
</html>
