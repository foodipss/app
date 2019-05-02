<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<body class="w3-light-grey">
<?php require_once "index.php"; ?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


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