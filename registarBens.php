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
$sql = "SELECT idBem, nomeBem, data, idFonte, idTipo FROM bem";
$result = $conn->query($sql);
$sql2 = "SELECT idTipo, tipo FROM tipo";
$result2= $conn->query($sql2);
$sql3 = "SELECT * FROM fonte";
$result3= $conn->query($sql3);


  ?>

<!-- Header -->
  <header class="w3-container" style="padding-top:22px">
   <center> <h5><b><i class="fa fa-dashboard"></i> Registar Bem</b></h5></center>
    <p>
  </header>

  <body>

<form action="queryRegistarBem.php" method="post">
  Nome do bem: <input type="text" name="nomeBem">
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