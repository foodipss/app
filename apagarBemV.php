<?php
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
$idBem=$_GET['idBem'];
$query="UPDATE bem SET visivel=0 WHERE idBem= '$idBem'";
$resultado=$conn->query($query);
?>

<html>
	<head>
	<title>Apagar Bem</title>
	</head>
	<body>
		<center>
		<?php
		echo "<script> alert('apagado com sucesso!');top.location.href='bensV.php';</script>";
		if($resultado>0){
			?>
	
		<?php }else{ ?>
		
		<h1>Erro ao Editar Informações</h1>
		
		<?php }?>
		
		<p></p>
		
		</center>
	</body>
</html>