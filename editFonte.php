<?php

  require_once "index.php";
  
  $conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
  
  $idfonte=$_GET['idfonte'];
  
 $query = "SELECT idfonte, nomefonte, moradafonte, emailfonte, contactofonte FROM fonte WHERE idfonte='$idfonte'";
  
  $resultado=$conn->query($query);
  
  $row=$resultado->fetch_assoc();

?>

 <style>
h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
input[type=text], select {
	
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 20%;
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
	      
button[type=button] {
  width: 20%;
  background-color: #FFBF00;
  color: white;
  padding: 14px 20px;
  
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button[type=button]:hover {
  background-color: #FF8000;
}
	      
</style>
<center> <h5><b>Editar Fonte</b></h5></center>

<form action="editFonte2.php" method="post" id="editFonte2">

    <input type="hidden" name="idfonte" value="<?php echo $idfonte; ?>">
    
    Nome da Fonte:
  <br>
    <input type="text" name="nomefonte"  value="<?php echo $row['nomefonte']; ?>"/>
  <br/>
  
  Morada:
  <br>
    <input type="text" name="moradafonte" value="<?php echo $row['moradafonte']; ?>"/>
    <br/>
  Email:
  <br>
    <input type="text" name="emailfonte"  value="<?php echo $row['emailfonte']; ?>"/>
  <br/>
      
  Contacto:
<br>
    <input type="text" name="contactofonte" maxlength="9"  value="<?php echo $row['contactofonte']; ?>"/>
   <br/>
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Concluir alterações" id="validar" class="btn btn-primary">
                <button type="button" value="Voltar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
  
  
</script>
</body>
</html>
