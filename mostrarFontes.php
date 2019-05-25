
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>REFOOD</title>

<?php require_once "index.php"; ?>


<header class="w3-container" style="padding-top:40px">
     <style>

h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
   </style>
   <center> <h5><b> Lista de Fontes </b></h5></center>
    <p>
  </header>

<?php
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");;
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

// pegar a pagina atual
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$itens_por_pagina = 5;


$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;


$sql = "SELECT * FROM fonte WHERE visivel='1' ORDER BY codigo_fonte  LIMIT $inicio, $itens_por_pagina";
  
$result = $conn->query($sql) or die($conn->error);;
  
$num_total = mysqli_num_rows($result);

//defifnir o numero de paginas
$num_paginas = ceil($num_total/$itens_por_pagina);
?>
  

<body>
  <div class="colFonte">
         <a href="registarFontes.php">Registar Nova fonte</a>
  <br>
  <p></p>
  <table class="table">

    <thead>
      <tr>
         <th>Código da Fonte</th>
         <th>Nome</th> 
  <th>Morada</th> 
  <th>Email</th>
  <th>Contacto</th>
  <th colspan=2></th>
 </tr>
    </thead>
<tbody>
    <?php while($row=$result->fetch_assoc()){?>
      <tr>
         <td><?php echo $row['codigo_fonte'];?>
      </td>
      <td><?php echo $row['nomefonte'];?>
      </td>
      <td>
      <?php echo $row['moradafonte'];?>
      </td>
      <td>
      <?php echo $row['emailfonte'];?>
      </td>
      <td>
      <?php echo $row['contactofonte'];?>
      </td>

<td>
  <a href="editFonte.php?idfonte=<?php echo $row['idfonte'];?>"class="fa fa-edit" style="font-size:24px;color:black"></a>
</td>
  <td>
  <a href="apagarFonte.php?idfonte=<?php echo $row['idfonte'];?>"class="fa fa-trash-o" style="font-size:24px;color:red"></a>
</td>

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

      <a href="mostrarFontes.php?pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="mostrarFontes.php?pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="mostrarFontes.php?pagina=<?php echo $pagina_seguinte ; ?>">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-right"></span>

    <?php } ?>

    </li>

  </ul>
</nav>
</div>
</body>
</html>
