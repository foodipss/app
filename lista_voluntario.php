<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<body>
	<?php require_once "index.php"; ?>
</body>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
   <center> <h5><b> Lista de Voluntários </b></h5></center>
    <p>
  </header>



<!-- Ligação Base de dados -->
<?php
require('conexao_perfil.php');

// pegar a pagina atual
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$itens_por_pagina = 5;


$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;

$query="SELECT idVoluntario, codigoVoluntario, nome, telefone FROM voluntario where visivel='1' ORDER BY codigoVoluntario LIMIT $inicio, $itens_por_pagina";


$resultado=$mysqli->query($query)or die($mysqli->error);

$num_total = mysqli_num_rows($resultado);

//defifnir o numero de paginas
$num_paginas = ceil($num_total/$itens_por_pagina);
?>


<div class="colunaListaVoluntario">
	<a href="novoVoluntario.php">Novo Voluntário</a>
 	<p></p>
 	<table class="table" id="voluntario">

    <thead>
      <tr>
        <th>Código Voluntário</th>
        <th>Nome</th>
        <th>Telefone</th>
      </tr>
    </thead>
<tbody>
		<?php while($row=$resultado->fetch_assoc()){?>
			<tr>
			<td><?php echo $row['codigoVoluntario'];?>
			</td>
			<td>
			<?php echo $row['nome'];?>
			</td>
			<td>
			<?php echo $row['telefone'];?>
			</td>

<td>
	<a href="editarVoluntario.php?idVoluntario=<?php echo $row['idVoluntario'];?>"class="fa fa-edit" style="font-size:24px;color:red"></a>
</td>
	<td>
	<a href="apagarVoluntario.php?idVoluntario=<?php echo $row['idVoluntario'];?>"class="fa fa-trash-o" style="font-size:24px;color:red"></a>
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

      <a href="lista_voluntario.php?pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="lista_voluntario.php?pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="lista_voluntario.php?pagina=<?php echo $pagina_seguinte ; ?>">
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
