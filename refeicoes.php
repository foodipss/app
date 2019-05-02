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
				<td>
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
						<input name="SendPesqUser" type="submit" class="btn btn-warning btn-lg" value="Pesquisar">
					</form></td>
				<td>linha 1 coluna 2</td>
				<td>linha 1 coluna 3</td>
			</tr>
			<tr>
				<td>linha 2 coluna 1</td>
				<td>linha 2 coluna 2</td>
				<td>linha 2 coluna 3</td>
			</tr>
		</table>
</body>
</html>