<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<title>REFOOD</title>

<?php require_once "index.php"; ?>

<header class="w3-container" style="padding-top:40px">
   
     <style>

h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
button {
    width: 20%;
    background-color: #FFBF00;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

   </style>
   
   <center> <h5><b> Lista de Bens </b></h5></center>
    <p>
  </header>

<br>
<?php
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");;
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
$sql = "SELECT * FROM bem WHERE visivel='1'";
$sql2 = "SELECT * from tipo";
$result = $conn->query($sql);
date_default_timezone_set('Europe/London');
//echo "The time is " . date("h:i:sa");
  ?>


<body>
  <div class="colBens">
  
  <p></p>
  <table class="table">

    <thead>
      <tr>
  <th>Nome</th> 
  <th>Tipo</th> 
  <th>Fonte</th>
  <th>Data</th>
  <th>Número de porções</th>
 </tr>
    </thead>
<tbody>
    <?php while($row=$result->fetch_assoc()){?>
      <tr>
      <td><?php echo $row['nomeBem'];?>
      </td>
      <td>
      <?php echo $row['tipoBem'];?>
      </td>
      <td>
      <?php echo $row['idFonte'];?>
      </td>
      <td>
      <?php echo $row['data'];?>
      </td>
  <td>
      <?php echo $row['porcao'];?>
      </td>
  <td>
  <a href="apagarBem.php?idBem=<?php echo $row['idBem'];?>" class="fa fa-trash-o" style="font-size:24px;color:red"></a>
</td>
</tr>
<?php } ?>

</tbody>



</table>
     
</div>
<br>

<form method="get" action="registarBens.php" >
    <button type="submit">Registar Entrega de Bens</button>
</form>

 

</body>
</html>
