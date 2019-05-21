<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
require_once "index.php";
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");;
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
$sql = "SELECT idBem, nomeBem, data, idFonte, idTipo FROM bem WHERE visivel='1'";
$result = $conn->query($sql);
$sql2 = "SELECT idTipo, tipo FROM tipo";
$result2= $conn->query($sql2);
$sql3 = "SELECT * FROM fonte WHERE visivel='1'";
$result3= $conn->query($sql3);
  ?>

<!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
      <style>

h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}

input[type=text], select {
	
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #FFBF00;
  color: white;
  padding: 14px 20px;
  
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #FF8000;
}



</style>
   <center> <h5><b>Registar Entrega de Bens</b></h5></center>
    <p>
  </header>

  <body>

<form action="queryRegistarBem.php" method="post">
  Nome do bem: <input type="text" name="nomeBem" required>
                  <br/>
  Número de porções: <input type="text" name="porcao" required>
                  <br/>
  Tipo do bem: <select name="tipoBem">
    <?php while ($row=$result2->fetch_assoc()){  
    echo "<option value='" . $row['tipo'] ."'>" . $row['tipo'] ."</option>";
  } ?>
  </select>
  <br/>
  Fonte: <select name="idfonte">
    <?php while ($row=$result3->fetch_assoc()){  
    echo "<option value='" . $row['codigo_fonte'] ."'>" . $row['codigo_fonte'] ."</option>";
  } ?>
  </select>
  <br/>

  <input type="hidden" name="data" value="<?php echo date('d-m-Y H:i:s'); ?>" readonly="readonly">
  

            <input type="submit" value="Insert">

</form>       





</body>
</html>
