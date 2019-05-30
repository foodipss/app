<?php
session_start();
include_once("conexaoPesquisa.php");
 $connect2 = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");  
 $query2 = "SELECT idFonte, count(*) as number FROM bem GROUP BY idFonte";  
 $result2 = mysqli_query($connect2, $query2); 
 ?>

<html>
<head>
  <title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php require_once "index.php"; ?>

  <h1 style="text-align: center;">Dados Estatisticos</h1>

      <div style="width: 100%;">
        <div style="width: 50%;">   
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['idFonte', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["idFonte"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Fontes que doaram o maior numero de bens:',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
          </div>
      <div style="width: 50%;">
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
      $sql = "SELECT codigo_beneficiario, deve from beneficiario order by deve desc";
      $resultado = $conn->query($sql);
      while ($row = mysqli_fetch_object($resultado)) {

        $codigo_beneficiario = $row->codigo_beneficiario;
        $deve = $row->deve;
        $lista[$i] = $codigo_beneficiario;
        $devia[$i] = $deve;
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

    </div>

  <div id="columnchart_values" style="width: 50%; height: 50%; float: right; padding: 5px;"></div> 
       
 </head> 
 <body> 
           <div style="width:100%;">  
              
                
                <div id="piechart" style="width: 50%; height: 50%; float: left; padding: 5px;"></div>  
           </div>  

           <br/>

      </body> 
      </div> 
 </html>  
