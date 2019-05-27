<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
  <?php require_once "index.php"; ?>
</body>


  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <style>

h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
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

	    
input[type=text] {
  width: 20%;
  background-color: #FFBF00;
  color: white;
  padding: 14px 20px;
  
  border: none;
  border-radius: 4px;
  cursor: pointer;
}



</style>
    
  <center> <h5><b> Registar Novo Voluntário </b></h5></center>
  </header>

  
            <form action="QueryVoluntario.php" method="post" id="func">
                Nome:
		    <br>
                                <input type="text" name="nome"  id="nome">
                       <br/>
		Telefone:
		    <br>
                                <input type="text" name="telefone" maxlength="9"  id="telefone">
                  <br/>
		 Email:
		   
            <br>
                                <input type="text" name="email"  id="email">
                        <br/>
		    Morada:
            <br>
                                <input type="text" name="morada"  id="morada">
                    <br/>
		    
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Registar Voluntario" id="validar" class="btn btn-primary">
                <button type="button" value="Cancelar" onClick="history.go(-1)" class="btn btn-primary">Cancelar</button>
            </form>
       
</body>
</html>
