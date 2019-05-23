<?php
session_start();
include_once("conexaoPesquisa.php");
?>

<html>
<title>REFOOD - Preparação de refeições</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<body>
		<?php require_once "index.php"; ?>
		
		<div style="width: 100%;">
			<div style="float: left; width: 25%;">
				<table>
					<tr style="padding: 25px">
						<th style="padding: 25px">Beneficiário</th>
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
					</tr>
						<?php
							$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
							if($SendPesqUser){
								$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
								$resultado_row_beneficiario = "SELECT codigo_beneficiario, restricoes FROM beneficiario WHERE codigo_beneficiario ='$codigo_beneficiario' ";
								$resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
								$row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
							}
						?>
					<tr>
						<td>
							Código <?php echo $row_beneficiario['codigo_beneficiario'];?>
						</td>
					</tr>
					<tr>
						<td>
							Restrições <?php echo $row_beneficiario['restricoes'];?>
						</td>
					</tr>
				</table>
			</div>
			
			<div style="float: left; width: 50%;">
				<table style="width:90%" class="table">
					<tr style="padding: 25px">
						<th style="padding: 25px">Histórico</th>
					</tr>
  
					<tr style="padding: 25px">
						<td>
						
							<?php
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data5 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
										$resultado_data5 = mysqli_query($conn, $resultado_data5) or die(mysqli_error($conn));
										$row_data5 = mysqli_fetch_assoc($resultado_data5);
									}
							?>
							<?php echo $row_data5['data'];?>
						</td>
						
						<td>
						
							<?php
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data4 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
										$resultado_data4 = mysqli_query($conn, $resultado_data4) or die(mysqli_error($conn));
										$row_data4 = mysqli_fetch_assoc($resultado_data4);
									}
							?>
							<?php echo $row_data4['data'];?>
						</td>
						
						<td>
						
							<?php
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data3 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
										$resultado_data3 = mysqli_query($conn, $resultado_data3) or die(mysqli_error($conn));
										$row_data3 = mysqli_fetch_assoc($resultado_data3);
									}
							?>
							<?php echo $row_data3['data'];?>
						</td>
						
						<td>
						
							<?php
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data2 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
										$resultado_data2 = mysqli_query($conn, $resultado_data2) or die(mysqli_error($conn));
										$row_data2 = mysqli_fetch_assoc($resultado_data2);
									}
							?>
							<?php echo $row_data2['data'];?>
						</td>
						
						<td>
						
							<?php
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data1 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem";
										$resultado_data1 = mysqli_query($conn, $resultado_data1) or die(mysqli_error($conn));
										$row_data1 = mysqli_fetch_assoc($resultado_data1);
									}
							?>
							<?php echo $row_data1['data'];?>
						</td>
					</tr>
  
					<tr style="padding: 25px">
						<td><?php echo $row_data5['nomeBem'];?></td>
						<td><?php echo $row_data4['nomeBem'];?></td>
						<td><?php echo $row_data3['nomeBem'];?></td>
						<td><?php echo $row_data2['nomeBem'];?></td>
						<td><?php echo $row_data1['nomeBem'];?></td>
					</tr>
				</table>
			
			<div style="float: left; width: 25%;">
				<table>
					<tr style="padding: 25px">
						<th style="padding: 25px">Cesto</th>
					</tr>
					
					<tr style="padding: 25px">
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
						<td style="padding: 25px"> <input type="submit" name="submit" class="btn-warning btn-lg" value="Eliminar"> </td>
						<td style="padding: 25px"> <input type="submit" name="submit" class="btn-warning btn-lg" value="Confirmar"> </td>
					</tr>
				</table>
			</div>
			<br style="clear: left;" />
		</div>
		
		<br>
		
		<div style="width: 100%;">
			<div style="float: left; width: 100%;">
			
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
			</div>
		</div>
	</body>
</html>