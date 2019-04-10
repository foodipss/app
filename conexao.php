<?php

$hostname = 'us-cdbr-iron-east-03.cleardb.net';
$username = 'b74a37105022bd';
$password = 'c0139137';
$database = 'heroku_af588fa1a66d1f3';
 
try {
    $conexao = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    //echo 'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
    	echo $e->getMessage();
    }
?>
