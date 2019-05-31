<!DOCTYPE html>
<html lang="pt-br">
<head>

<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
  
   <script>
   
  </script>

 </head>

<body> 
  <?php
    if (!isset($_SESSION['use'])) { // If session is not set then redirect to Login Page
        ?>
        <script>
            window.location.href = "login.php";
        </script>
    <?php
}

?>

<?php require_once "index.php"; ?>

    <h3 align="center" style="font-size:30px">Manual de Utilizador</h3>
<h4  style="font-size:15px">O presente documento consolida a informação necessária para utilização da plataforma web</h4>
<br>

<div  style="width:500px;height:400px; float:left;">
<embed height="100%" width="100%" name="embed_content" src="manualUtilizador.pdf" />

</div>

</body>
</html>
