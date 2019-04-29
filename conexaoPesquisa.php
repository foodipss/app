<?php
$servidor = "us-cdbr-iron-east-03.cleardb.net";
$usuario = "b74a37105022bd";
$senha = "c0139137";
$dbname = "heroku_af588fa1a66d1f3";

//$db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");


//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);