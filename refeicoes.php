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
							$resultado_row_beneficiario = "SELECT r.data, b.nomeBem, n.restricoes from refeicao r, bem b, beneficiario n where codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
							$resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
							$row_row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
						}
					?>
					
					<p><b>Restricoes</b> <?php echo $row_row_beneficiario['restricoes'];?> </p>
					<p><b>Data</b> <?php echo $row_row_beneficiario['data'];?> </p>
					<p><b>Bem</b> <?php echo $row_row_beneficiario['nomeBem'];?> </p>
					
				</td>
				
				<td style="padding: 25px">
				
					<?php
						$name = "";

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = test_input($_POST["name"]);
						}

						function test_input($data) {
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
							}
						?>

					<?php
						echo $name;
						
					?>
					
				</td>
				<td style="padding: 25px"> <input type="submit" name="submit" class="btn-warning btn-lg" value="-"> </td>
				<td style="padding: 25px"> <input type="submit" name="submit" class="btn-warning btn-lg" value="Confirmar"> </td>
				
			</tr>
		</table>
		
		<br></br>
		<?php 
		
		$pratododia = "SELECT tipoBem, nomeBem FROM bem WHERE visivel='1'";
		$con = $conn->query($pratododia) or die($conn->error);
		?>
		
		<table style="width:100%" class="table">
			<tr style="padding: 25px">
				<th style="padding: 25px">Pratos do dia</th>
			</tr>
				<?php while ($alimentos = $con->fetch_array()) { ?>
			<tr style="padding: 25px">
				<td style="padding: 10px"> <?php echo $alimentos['tipoBem'];?> </td>
				<td style="padding: 10px"> 
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
						<input style="padding: 10px" name="name" value="<?php echo $alimentos['nomeBem']?>">
						 
				</td>
				<td>
						<input type="submit" name="submit" class="btn-warning btn-lg" value="+"> 
					</form>
				</td>
				
			</tr>
				<?php } ?>
		</table>
	</body>
</html>