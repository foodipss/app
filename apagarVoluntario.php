<?php

require('conexao.php');

$idVoluntario=$_GET['idVoluntario'];

$query="DELETE FROM voluntario WHERE idVoluntario='$idVoluntario'";

$resultado=$mysqli->query($query);

?>

<html>
	<head>
	<title>Apagar Voluntário</title>
	</head>
	<body>
		<center>
		<?php
		echo $resultado;
		if($resultado>0){
			?>
		
			<!-- <h1>Condominio Apagado</h1> -->
			echo "<script> alert('Apagado com sucesso!');top.location.href='voluntario.php';</script>";
			
		<?php }else{ ?>
		
		<h1>Erro ao Apagar o Condominio</h1>
		
		<?php }?>
		
		<p></p>
		
		</center>
	</body>
</html>