<?php 

$db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");

$nomefonte = $_POST['nomefonte'];
if(isset($_POST['codigo_fonte'])){
	 $codigo_fonte = $_POST['codigo_fonte'];
	
	$db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
    	$sql = mysqli_query($db, "SELECT * FROM fonte WHERE codigo_fonte = '{$codigo_fonte}'") or print mysql_error();

    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) 
        echo json_encode(array('codigo_fonte' => 'Ja existe um usuario cadastrado com este email')); 
    else 
        echo json_encode(array('codigo_fonte' => 'Usuário valido.' )); 
}
};
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

header("refresh:2; url=mostrarFontes.php");

?>
