<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<title>REFOOD</title>

<?php require_once "indexVoluntario.php"; ?>

<header class="w3-container" style="padding-top:40px">
   
     <style>
h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
button {
    width: 20%;
    background-color: #FFBF00;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
   </style>
   
   <center> <h5><b> Lista de Bens </b></h5></center>
    <p>
  </header>

<br>
<?php
// pegar a pagina atual
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$itens_por_pagina = 7;
$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");;
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
$sql = "SELECT * FROM bem WHERE visivel='1' LIMIT $inicio, $itens_por_pagina";
$sql2 = "SELECT * from tipo";
$result = $conn->query($sql) or die($conn->error);;
date_default_timezone_set('Europe/London');
$num_total = mysqli_num_rows($result);
//defifnir o numero de paginas
$num_paginas = ceil($num_total/$itens_por_pagina);
//echo "The time is " . date("h:i:sa");
  ?>


<body>
  
  <div class="colBens">
  
  <p></p>
  <table class="table">

    <thead>
      <tr>
  <th>Nome</th> 
  <th>Tipo</th> 
  <th>Fonte</th>
  <th>Data</th>
  <th>Número de porções</th>
 </tr>
    </thead>
<tbody>
    <?php while($row=$result->fetch_assoc()){?>
      <tr>
      <td><?php echo $row['nomeBem'];?>
      </td>
      <td>
      <?php echo $row['tipoBem'];?>
      </td>
      <td>
      <?php echo $row['idFonte'];?>
      </td>
      <td>
      <?php echo $row['data'];?>
      </td>
  <td>
      <?php echo $row['porcao'];?>
      </td>
  <td>
  <a href="apagarBemV.php?idBem=<?php echo $row['idBem'];?>" class="fa fa-trash-o" style="font-size:24px;color:red"></a>
</td>
</tr>
<?php } ?>

</tbody>



</table>

<?php
$pagina_anterior = $pagina - 1;
$pagina_seguinte = $pagina + 1;
?>

<nav class="text-center">
  <ul class="pager">
    <li class="previous">  

    <?php 
      if ($pagina_anterior != 0){ ?>

      <a href="bensV.php?pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="bensV.php?pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="bensV.php?pagina=<?php echo $pagina_seguinte ; ?>">
        <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>

    <?php } ?>

    </li>


  </ul>
</nav>


     
</div>
<br>

<form method="get" action="registarBensV.php" >
    <button type="submit">Registar Entrega de Bens</button>
</form>

 

</body>
</html>
