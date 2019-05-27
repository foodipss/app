<?php

require('conexao_perfil.php');

$idVoluntario=$_POST['idVoluntario'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$morada=$_POST['morada'];


$query="UPDATE voluntario SET nome='$nome', telefone='$telefone', email='$email', morada='$morada' WHERE idVoluntario= '$idVoluntario'";

$resultado=$mysqli->query($query);

?>

<html>
	<head>
	<title>Editar Informações sobre o Voluntário</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('Editado com sucesso!');top.location.href='lista_voluntario.php';</script>";
		if($resultado>0){
			?>
	
		<?php }else{ ?>
		
		<h1>Erro ao Editar Informações</h1>
		
		<?php }?>
		
		</center>
	</body>
</html>
		
