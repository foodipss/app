<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<?php require_once "index.php"; ?>

<!-- Header -->
  <header class="w3-container" style="padding-top:22px">
   <center> <h5><b><i class="fa fa-dashboard"></i> Registar Fonte </b></h5></center>
    <p>
  </header>

<form action="queryRegistarFonte.php" method="post">
  Nome da Fonte: <input type="text" name="nomefonte" required>
                  <br/>
  Código Fonte: <input type="text" name="codigo_fonte" value = F required>
                  <br/>
  Morada da Fonte: <input type ="text" name="moradafonte" required>
                  <br/>
  Email da Fonte: <input type="text" name="emailfonte" required>
                  <br/>
  Telefone da Fonte: <input type="text" name="contactofonte" required>
                  <br/>
                  <input type="submit" value="Insert">
</form>       






</body>
</html>
