<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php require_once "index.php"; ?>

<!-- Header -->
    <header class="w3-container" style="padding-top:40px">
    
        
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
	  </style>

   <center> <h5>Registar Fonte</b></h5></center>
    <p>
  </header>
<body>
<form action="queryRegistarFonte.php" method="post">
  Nome da Fonte: 
  <br>      
  <input type="text" name="nomefonte" required>
                  <br/><br>	
<br>
  Código Fonte:
  <br>
  <input type="text" name="codigo_fonte" value = F required>
                  <br/>
	
		  <?php 
			
			include_once("conexaoPesquisa.php");
			
				$result = $conn->query("SELECT * FROM fonte ORDER BY codigo_fonte DESC LIMIT 1");
				while($rows = $result->fetch_assoc()) {
				$codigo = $rows['codigo_fonte'];
			    	echo "Nota: O último código registado foi o " , $codigo;
			}
		
			?>
	
	<br>
	<br>
  Morada da Fonte: 
  <br>      
  <input type ="text" name="moradafonte" required>
                  <br/><br>
  Email da Fonte: 
  <br>
  <input type="text" name="emailfonte" required>
                  <br/><br>
  Telefone da Fonte:
  <br>      
  <input type="text" name="contactofonte" required>
                  <br/><br>
        
                  <input type="submit" value="Registar Fonte">
		  <input type="submit" value="Cancelar" onClick="history.go(-1)" class="btn btn-primary"> </input>
</form>       






</body>
</html>
