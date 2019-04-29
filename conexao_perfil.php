<?php
$mysqli=new mysqli("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
 
 if(mysqli_connect_errno()){
	 echo 'Conexao Falhada:',mysqli_connect_error();
	 exit();
 }
 
 ?>