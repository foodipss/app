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
   <center> <h5><b><i class="fa fa-dashboard"></i> Lista de Voluntários </b></h5></center>
    <p>
  </header>



<!-- Ligação Base de dados -->
<?php
require('conexao_perfil.php');

$query="SELECT idVoluntario, codigoVoluntario, nome, telefone FROM voluntario where visivel='1'";

$resultado=$mysqli->query($query);

?>


<div class="colunaListaVoluntario">
	<a href="novoVoluntario.php">Novo Voluntário</a>
 	<p></p>
 	<table class="table">

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
	<a href="editarVoluntario.php?idVoluntario=<?php echo $row['idVoluntario'];?>">Editar Informações </a>
</td>
	<td>
	<a href="apagarVoluntario.php?idVoluntario=<?php echo $row['idVoluntario'];?>">Apagar Voluntário </a>
</td>

<?php } ?>

</tbody>



</table>
</div>
</body>
</html>