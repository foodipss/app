<?php

require('conexao.php');

$idBeneficiario=$_GET['idBeneficiario'];

$query="UPDATE beneficiario set visivel= '0' WHERE idBeneficiario='$idBeneficiario'";

$resultado=$mysqli->query($query);

?>

<html>
	<head>
	<title>Apagar Beneficiário</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('Apagado com sucesso!');top.location.href='lista_beneficiario.php';</script>";
		if($resultado>0){
			?>
			
		<?php }else{ ?>
		
		<h1>Erro ao Apagar o Beneficiário</h1>
		
		<?php }?>
		
		<p></p>
		
		</center>
	</body>
</html>