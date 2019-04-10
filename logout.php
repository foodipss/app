
<?php


session_destroy(); //saimos da sessão

session_unset(); //limpamos as variaveis globais das sessões

echo "<script> alert('A sua sessão foi encerrada com sucesso!');top.location.href='login.php';</script>";

?>

