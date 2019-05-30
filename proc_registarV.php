
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
session_start();
include_once("conexaoPesquisa.php");
date_default_timezone_set('Europe/London');

$idtupperware = filter_input(INPUT_POST, 'idtupperware', FILTER_SANITIZE_NUMBER_INT);
$idBeneficiario = filter_input(INPUT_POST, 'idBeneficiario', FILTER_SANITIZE_NUMBER_INT);
$quantidadeLevou = filter_input(INPUT_POST, 'quantidadeLevou', FILTER_SANITIZE_NUMBER_INT);
$quantidadeEntregue = filter_input(INPUT_POST, 'quantidadeEntregue', FILTER_SANITIZE_NUMBER_INT);
$data = date("y/m/d H:i:s");
$isRecolha=1;
$deviaOntem=filter_input(INPUT_POST, 'deviaOntem', FILTER_SANITIZE_NUMBER_INT);

$result_tupperware = "INSERT INTO tupperware (idtupperware, idBeneficiario, quantidadeLevou, isRecolha, quantidadeEntregue, data, deviaOntem) VALUES ('$idtupperware', '$idBeneficiario', '$quantidadeLevou', $isRecolha, '$quantidadeEntregue', '$data', '$deviaOntem')";
$deve_benef= "UPDATE beneficiario SET deve='$deviaOntem' WHERE idBeneficiario='$idBeneficiario'";
$resultado_tupperware = mysqli_query($conn, $result_tupperware) or die(mysqli_error($conn));
$resultado_final=mysqli_query($conn, $deve_benef) or die(mysqli_error($conn));

if(mysqli_insert_id($conn)){
	?>	
<script> alert("Registado com sucessso");
top.location.href='pesquisarV.php';
</script>
<?php
}else{ 
?>
	<script> alert("Registado com sucessso");
	top.location.href='pesquisarV.php';
	</script>	
<?php } ?>
	
