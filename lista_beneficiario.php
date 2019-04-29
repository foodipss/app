<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
  <?php require_once "index.php"; ?>
</body>


<!-- Bootstrap lista-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
   <center> <h5><b><i class="fa fa-dashboard"></i> Lista de Beneficiário </b></h5></center>
    <p>
  </header>


<!-- Ligação Base de dados -->
<?php
require('conexao_perfil.php');

$query="SELECT idBeneficiario, nome, morada, telefone, nr_elementos_agregado, codigo_beneficiario FROM beneficiario where visivel='1'";

$resultado=$mysqli->query($query);

?>


<div class="colunaListaBeneficiario">
	<a href="novoBeneficiario.php">Novo Beneficiário</a>
 	<p></p>
 	<table class="table">

    <thead>
      <tr>
        <th>Código Beneficiário</th>
        <th>Nome</th>
        <th>Morada</th>
        <th>Telefone</th>
        <th>Número Elementos Agregado</th>
      </tr>
    </thead>
<tbody>
		<?php while($row=$resultado->fetch_assoc()){?>
			<tr>
			<td><?php echo $row['codigo_beneficiario'];?>
			</td>
			<td>
			<?php echo $row['nome'];?>
			</td>
      <td>
      <?php echo $row['morada'];?>
      </td>
			<td>
			<?php echo $row['telefone'];?>
			</td>
      <td>
      <?php echo $row['nr_elementos_agregado'];?>
      </td>

<td>
	<a href="editarBeneficiario.php?idBeneficiario=<?php echo $row['idBeneficiario'];?>">Editar Informações </a>
</td>
	<td>
	<a href="apagarBeneficiario.php?idBeneficiario=<?php echo $row['idBeneficiario'];?>">Apagar Beneficiário </a>
</td>

<?php } ?>

</tbody>



</table>
</div>
</body>
</html>