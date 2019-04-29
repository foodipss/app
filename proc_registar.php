
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<?php
session_start();
include_once("conexaoPesquisa.php");


$idtupperware = filter_input(INPUT_POST, 'idtupperware', FILTER_SANITIZE_NUMBER_INT);
$idBeneficiario = filter_input(INPUT_POST, 'idBeneficiario', FILTER_SANITIZE_NUMBER_INT);
$quantidadeLevou = filter_input(INPUT_POST, 'quantidadeLevou', FILTER_SANITIZE_NUMBER_INT);
$quantidadeEntregue = filter_input(INPUT_POST, 'quantidadeEntregue', FILTER_SANITIZE_NUMBER_INT);
$data = date("y/m/d");
$isRecolha=1;

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_tupperware = "INSERT INTO tupperware (idtupperware, idBeneficiario, quantidadeLevou, isRecolha, quantidadeEntregue, data) VALUES ('§idtupperware', '$idBeneficiario', '$quantidadeLevou', $isRecolha, '$quantidadeEntregue', '$data')";
$resultado_tupperware = mysqli_query($conn, $result_tupperware) or die(mysqli_error($conn));

if(mysqli_insert_id($conn)){
	//$_SESSION['msg'] = "<p style='color:green;'>Registado com sucesso</p>";
	//header("Location: pesquisar.php");
	?>	
<script> alert("Registado com sucessso");
top.location.href='pesquisar.php';
</script>
<?php
}else{ 
	//$_SESSION['msg'] = "<p style='color:red;'>Não foi possível ser registado com sucesso</p>";
	//header("Location: pesquisar.php");
?>
	<script> alert("Erro ao registar");
	top.location.href='pesquisar.php';
	</script>	
<?php } ?>
	
