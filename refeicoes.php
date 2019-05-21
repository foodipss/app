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
			<tr style="padding: 25px">
				<th style="padding: 25px">Beneficiário</th>
				<th style="padding: 25px">Histórico</th>
				<th style="padding: 25px">Cesto</th>
			</tr>
			<tr style="padding: 25px">
				<td style="padding: 25px">
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
					</form>
				</td>
					
				<td style="padding: 25px">
					
					<?php
						$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
						if($SendPesqUser){
							$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
							$resultado_row_beneficiario = "SELECT * from beneficiario where codigo_beneficiario ='$codigo_beneficiario'";
							$resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
							$row_row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
						}
					?>
					
					<p><b>Benefiário</b> <?php echo $row_row_beneficiario['nome'];?> </p>
					<p><b>Contacto</b> <?php echo $row_row_beneficiario['telefone'];?> </p>
					
				</td>
				
				<td style="padding: 25px">LINHA 1 COLUNA 3</td>
			</tr>
		</table>
		
		<br></br>
		<?php 
		
		$consulta = "SELECT nomeBem FROM bem WHERE visivel='1'";
		$con = $conn->query($consulta) or die($conn->error);
		?>
		
		<table style="width:100%">
			<tr style="padding: 25px">
				<th style="padding: 25px">Pratos do dia</th>
			</tr>
				<?php while ($dado = $con->fetch_array()) { ?>
			<tr style="padding: 25px">
				<td style="padding: 25px">
					
					<?php echo $dado['nomeBem'];?>
				
				</td>
			</tr>
				<?php } ?>
		</table>
	</body>
</html>