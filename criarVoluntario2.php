<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["query"])=='novoVoluntario') {
    $db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
    $idVoluntario = mysqli_real_escape_string($db,$_POST["idVoluntario"]);
    $nome = mysqli_real_escape_string($db,$_POST["nome"]);
    $telefone = mysqli_real_escape_string($db,$_POST["telefone"]);
    
    $query = "INSERT INTO voluntario (idVoluntario, nome, telefone) VALUES (4, '$nome', '$telefone')";
    $queryq = mysqli_query($db, $query);
    
}

else {
   echo "<script> alert('Parabéns ! O seu registo foi aceite.');top.location.href='voluntario.php';</script>";
  }

mysqli_close($db);
?>
