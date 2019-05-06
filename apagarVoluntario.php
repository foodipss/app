<?php

require('conexao_perfil.php');

$idVoluntario=$_GET['idVoluntario'];

$query="UPDATE voluntario set visivel= '0' WHERE idVoluntario='$idVoluntario'";

$resultado=$mysqli->query($query);

?>

<html>
	<head>
	<title>Apagar Voluntário</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('Apagado com sucesso!');top.location.href='lista_voluntario.php';</script>";
		if($resultado>0){
			?>
			
		<?php }else{ ?>
		
		<h1>Erro ao Apagar o Voluntário</h1>
		
		<?php }?>
		
		<p></p>
		
		</center>
	</body>
</html>
