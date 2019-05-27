<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


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
  <center> <h5><b> Registar Novo Beneficiario </b></h5></center>
	  <p>
  </header>

	<body>
  
            <form action="QueryBeneficiario.php" method="post" id="beneficiario">
              
                                
                         Código Beneficiário: 
		    <br>
			<input type="text" name="codigo_beneficiario" value = B class="form-control" id="codigo_beneficiario">
				
				<br>
				<?php 
			
			include_once("conexaoPesquisa.php");
			
				$result = $conn->query("SELECT * FROM beneficiario ORDER BY codigo_beneficiario DESC LIMIT 1");
				while($rows = $result->fetch_assoc()) {
				$codigo = $rows['codigo_beneficiario'];
			    	echo "Nota: O último código registado foi o " , $codigo;
			}
		
			?>

				Nome:			
				<br>
                                <input type="text" name="nome" class="form-control" id="nome" >
                 		<br/>
		    
		    		Morada:
				<br>
                                <input type="text" name="morada" class="form-control" id="morada" >
                      		 <br/>
		    
		    		Telefone:
				    <br>
                                <input type="text" name="telefone" maxlength="9" class="form-control" id="telefone" >
               				
		    		<br/>
		    		Número de Adultos:
				    <br>
                                <input type="text" name="nr_elementos_agregado" class="form-control" id="nr_elementos_agregado" >
                           <br/>
		    
				 Número de Crianças:
		    		<br>
                                <input type="text" name="nr_elementos_criancas" class="form-control" id="nr_elementos_criancas" >
                            <br/>
		    
		  	Restrições Alimentares:
				    <br>
                                <input type="text" name="restricoes" class="form-control" id="restricoes" >
                       <br/>
                
                <input type='hidden' name='query' value="NovoBeneficiário">
                <input type="submit" value="Registar Beneficiário" id="validar" class="btn btn-primary">
                 <button type="button" value="Cancelar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
     
</body>
</html>
