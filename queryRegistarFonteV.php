<?php 
$db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
$nomefonte = $_POST['nomefonte'];
$codigo_fonte = $_POST['codigo_fonte'];
$moradafonte = $_POST['moradafonte'];
$emailfonte = $_POST['emailfonte'];
$contactofonte = $_POST['contactofonte'];
$sql = "INSERT INTO fonte (nomefonte, codigo_fonte, moradafonte, emailfonte, contactofonte) VALUES ('$nomefonte','$codigo_fonte', '$moradafonte', '$emailfonte', '$contactofonte')";
if(!mysqli_query($db, $sql)) {
	echo 'Not Inserted';
}
else
{
	echo 'Inserted';
}
header("refresh:2; url=mostrarFontesV.php");
?>