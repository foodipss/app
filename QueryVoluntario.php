<html>
<body>

<?php

$con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");

$nome = $_POST['nome']; 
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$morada = $_POST['morada'];
$query = "INSERT INTO voluntario ( nome, telefone, email, morada) VALUES ('$nome','$telefone', '$email', '$morada')";
$queryq = mysqli_query($con, $query);

echo "<script> alert('Parabéns ! O seu registo foi aceite.');top.location.href='lista_voluntario.php';</script>";
mysqli_close( $con); 
?>

</body>
</html>

