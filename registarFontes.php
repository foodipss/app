<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>
<?php require_once "index.php"; ?>

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

   <center> <h5>Registar Fonte</b></h5></center>
    <p>
  </header>

<form action="queryRegistarFonte.php" method="post">
  Nome da Fonte: 
  <br>      
  <input type="text" name="nomefonte" required>
                  <br/><br>
  Código Fonte:
  <br>
  <input type="text" name="codigo_fonte" value = F required>
                  <br/><br>
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
</form>       






</body>
</html>
