<!DOCTYPE html>
<html>
<title>REFOOD</title>

<?php require_once "indexVoluntario.php"; ?>


<?php
$conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");;
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
$sql = "SELECT idfonte, nomefonte, moradafonte, emailfonte, contactofonte FROM fonte WHERE visivel='1'";
$result = $conn->query($sql);
  ?>

<body>
  <div class="colFonte">
  
  <p></p>
  <table class="table">

    <thead>
      <tr>
         <th>Nome</th> 
  <th>Morada</th> 
  <th>Email</th>
  <th>Contacto</th>
  <th colspan=2>Operações</th>
 </tr>
    </thead>
<tbody>
    <?php while($row=$result->fetch_assoc()){?>
      <tr>
      <td><?php echo $row['nomefonte'];?>
      </td>
      <td>
      <?php echo $row['moradafonte'];?>
      </td>
      <td>
      <?php echo $row['emailfonte'];?>
      </td>
      <td>
      <?php echo $row['contactofonte'];?>
      </td>
<?php } ?>

</tbody>
</table>
</div>
</body>
</html>