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

$query="SELECT idBeneficiario, nome, codigo_beneficiario, restricoes FROM beneficiario where visivel='1' ORDER BY codigo_beneficiario";

$resultado=$mysqli->query($query);

?>


<div class="colunaListaBeneficiario">
 	<p></p>
 	<table class="table">

    <thead>
      <tr>
        <th>Código Beneficiário</th>
        <th>Nome</th>
        <th>Restricoes Alimentares</th>
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
      <?php echo $row['restricoes'];?>
      </td>
<?php } ?>

</tbody>



</table>
</div>
</body>
</html>