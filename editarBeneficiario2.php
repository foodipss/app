<?php

require('conexao_perfil.php');

$idBeneficiario=$_POST['idBeneficiario'];
$codigo_beneficiario=$_POST['codigo_beneficiario'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$morada=$_POST['morada'];
$nr_elementos_agregado=$_POST['nr_elementos_agregado'];


$query="UPDATE beneficiario SET  codigo_beneficiario='$codigo_beneficiario', nome='$nome', telefone='$telefone', morada='$morada', nr_elementos_agregado='$nr_elementos_agregado' WHERE idBeneficiario= '$idBeneficiario'";

$resultado=$mysqli->query($query);

?>

<html>
	<head>
	<title>Editar Informações sobre o Beneficiário</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('Editado com sucesso!');top.location.href='lista_beneficiario.php';</script>";
		if($resultado>0){
			?>
	
		<?php }else{ ?>
		
		<h1>Erro ao Editar Informações</h1>
		
		<?php }?>
		
		</center>
	</body>
</html>
		