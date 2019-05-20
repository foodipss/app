<?php 
$db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
date_default_timezone_set('Europe/London');
$nomeBem = $_POST['nomeBem'];
$porcao = $_POST['porcao'];
$tipoBem = $_POST['tipoBem'];
$idfonte = $_POST['idfonte'];
$data = date("y/m/d H:i:s");


$sql = "INSERT INTO bem (nomeBem, porcao, tipoBem, idfonte, data) VALUES ('$nomeBem', '$porcao', '$tipoBem', '$idfonte', '$data')";


if(mysqli_query($db, $sql)) {
		?>	
<script> alert("Registado com sucessso");
top.location.href='bens.php';
</script>
<?php
}else{ 
?>
	<script> alert("Erro ao registar");
	top.location.href='bens.php';
	</script>	
<?php } ?>
