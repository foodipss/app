<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
session_start();
include_once("conexaoPesquisa.php");
date_default_timezone_set('Europe/London');

$idRefeicao = filter_input(INPUT_POST, 'idRefeicao', FILTER_SANITIZE_NUMBER_INT);
$idBem = filter_input(INPUT_POST, 'idBem', FILTER_SANITIZE_NUMBER_INT);
$idBenef = filter_input(INPUT_POST, 'idBenef', FILTER_SANITIZE_NUMBER_INT);
$data = date("Y/m/d");

$registo = "INSERT INTO refeicao (idRefeicao, idBem, idBenef, data) VALUES ('$idRefeicao', '$idBem', '$idBenef','$data')";
$resultado_registo = mysqli_query($conn, $registo) or die(mysqli_error($conn));

if(mysqli_insert_id($conn)){
	?>	
<script> alert("Registado com sucessso");
location.href='refeicoesV.php';
</script>
<?php
}else{ 
?>
	<script> alert("Erro ao registar");
	top.location.href='refeicoesV.php';
	</script>	
<?php } ?>
	