<?php

$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");

$idfonte=$_POST['idfonte'];
$nomefonte=$_POST['nomefonte'];
$moradafonte=$_POST['moradafonte'];
$emailfonte=$_POST['emailfonte'];
$contactofonte=$_POST['contactofonte'];


$query="UPDATE fonte SET nomefonte='$nomefonte', moradafonte='$moradafonte', emailfonte='$emailfonte', contactofonte='$contactofonte' WHERE idfonte= '$idfonte'";

$resultado=$conn->query($query);

?>

<html>
	<head>
	<title>Editar Informações sobre a Fonte</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('Editado com sucesso!');top.location.href='mostrarFontes.php';</script>";
		if($resultado>0){
			?>
	
		<?php }else{ ?>
		
		<h1>Erro ao Editar Informações</h1>
		
		<?php }?>
		
		</center>
	</body>
</html>
		
