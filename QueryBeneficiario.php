<html>
<body>

<?php

$con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");

$codigo_beneficiario = $_POST['codigo_beneficiario'];
$nome = $_POST['nome']; 
$morada = $_POST['morada']; 
$telefone = $_POST['telefone'];
$nr_elementos_agregado = $_POST['nr_elementos_agregado'];
$nr_elementos_criancas = $_POST['nr_elementos_criancas'];
$restricoes = $_POST['restricoes'];

$query = "INSERT INTO beneficiario ( codigo_beneficiario, nome, morada, telefone, nr_elementos_agregado, nr_elementos_criancas, restricoes ) VALUES ( '$codigo_beneficiario', '$nome', '$morada', '$telefone', '$nr_elementos_agregado', '$restricoes')";
$queryq = mysqli_query($con, $query);

echo "<script> alert('Parabéns ! O seu registo foi aceite.');top.location.href='lista_beneficiario.php';</script>";
mysqli_close( $con); 
?>

</body>
</html>
