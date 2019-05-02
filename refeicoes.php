<?php
session_start();
include_once("conexaoPesquisa.php");
?>

<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<body>
		<?php require_once "index.php"; ?>

		<table style="width:100%">
			<tr>
				<th>Beneficiário</th>
				<th>Histórico</th> 
				<th>Cesto</th>
			</tr>
			<tr>
				<td>Jill</td>
				<td>Smith</td>
				<td>50</td>
			</tr>
			<tr>
				<td>Eve</td>
				<td>Jackson</td>
				<td>94</td>
			</tr>
			<tr>
				<td>John</td>
				<td>Doe</td>
				<td>80</td>
			</tr>
		</table>
		
    <br>
		<form method="POST" action="">
			<input list="browsers" class="btn btn-default btn-lg" name="codigo_beneficiario">
			<datalist id="browsers" >
			<?php 
			
			$result = $conn->query("SELECT codigo_beneficiario, nome FROM beneficiario WHERE visivel='1'");
			
			while($rows = $result->fetch_assoc()) {
				$codigo = $rows['codigo_beneficiario'];
			    $nome = $rows['nome'];
				echo "<option value='$codigo'>$nome</option>";
			}
			?>	
			</datalist>
			<br>
			<!--<a href="listar2.php">Todos</a><br>--> 
			<br><input name="SendPesqUser" type="submit" class="btn btn-warning btn-lg" value="Pesquisar">
		</form><br>

</body>
</html>