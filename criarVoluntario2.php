<html>
<body>

<?php
require('conexao.php');

$con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
  
$idVoluntario=$_POST['idVoluntario'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];

 
 $sql = "INSERT INTO voluntario (idVoluntario, nome, telefone) VALUES (7,'$nome','$telefone')"; 
if (!$sql){
  die("Error: 'mysqli_error()'");
  } else {
   echo "<script> alert('Parabéns ! O seu registo foi aceite.');top.location.href='voluntario.php';</script>";
  }

 
mysqli_close($con); 
?>

</body>
</html>
