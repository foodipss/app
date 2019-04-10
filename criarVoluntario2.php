<html>
<body>

<?php

$con = mysql_connect("us-cdbr-iron-east-03.cleardb.net","b74a37105022bd","c0139137");
if (! $con){
  die ( "Não foi possível conectar: ​​'mysql_error ()'");
  } else { 
  mysql_select_db('heroku_af588fa1a66d1f3', $con);
  $nome = $_POST['nome']; 
  $telefone = $_POST['telefone'];
 
  $sql = mysql_query("INSERT INTO voluntario (idVoluntario, nome, telefone) VALUES 
  (6,'$nome','$telefone')"); 
  
  if (!$sql){
	die("Error: 'mysql_error()'");
  } else {
   echo "<script> alert('Parabéns ! O seu registo foi aceite.');top.location.href='menuadministrador.php';</script>";
  }
}
 
mysql_close( $con); 
?>

</body>
</html>
