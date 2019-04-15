<?php
$mysqli=new mysqli("localhost", "root", "ptsi", "refood");
 
 if(mysqli_connect_errno()){
	 echo 'Conexao Falhada:',mysqli_connect_error();
	 exit();
 }
 
 ?>