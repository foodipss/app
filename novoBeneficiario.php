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
   
<!-- Bootstrap formulário -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
	
  width: 100%;
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

button{
	
	  width: 20%;
  background-color: #FFBF00;
  color: white;
  padding: 14px 20px;
  
  border: none;
  border-radius: 4px;
  cursor: pointer;
	
}
      
button[type=button]{
	
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
  </header>

  
            <form action="QueryBeneficiario.php" method="post" id="beneficiario">
                <table id="tableBeneficiario">
                  <tr>
                        <td>    <div class="form-group">
                                
                                <label for='codigo_beneficiario'>Código Beneficiário</label>
								<br>
                           
			<input type="text" name="codigo_beneficiario" value = B class="form-control" id="codigo_beneficiario">
				
				
				<?php 
			
			include_once("conexaoPesquisa.php");
			
				$result = $conn->query("SELECT * FROM beneficiario ORDER BY codigo_beneficiario DESC LIMIT 1");
				while($rows = $result->fetch_assoc()) {
				$codigo = $rows['codigo_beneficiario'];
			    	echo "Nota: O último código registado foi o " , $codigo;
			}
		
			?>
                       </div>
                        </td>

                    </tr>
                    <tr>
                        <td>    <div class="form-group">
                                
                                <label for='nome'>Nome</label>
								<br>
                                <input type="text" name="nome" class="form-control" id="nome" >
                       </div>
                        </td>

                    </tr>

                    <tr>
                        <td>    <div class="form-group">
                                
                                <label for='nome'>Morada</label>
								<br>
                                <input type="text" name="morada" class="form-control" id="morada" >
                       </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input name="telefone" maxlength="9" class="form-control" id="telefone" >
                            </div>
                       </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="nr_elementos_agregado">Número de Adultos</label>
                                <input name="nr_elementos_agregado" class="form-control" id="nr_elementos_agregado" >
                            </div>
                       </td>
                     </tr>

					 <tr>
                        <td>
                            <div class="form-group">
                                <label for="nr_elementos_criancas">Número de Criancas</label>
                                <input name="nr_elementos_criancas" class="form-control" id="nr_elementos_criancas" >
                            </div>
                       </td>
                     </tr>

                      <tr>
                        <td>
                            <div class="form-group">
                                <label for="restricoes">Restricoes Alimentares</label>
                                <input name="restricoes" class="form-control" id="restricoes" >
                            </div>
                       </td>
                     </tr>



                 
                  
                </table>
                <p></p>
                <input type='hidden' name='query' value="NovoBeneficiário">
                <input type="submit" value="Registar Beneficiário" id="validar" class="btn btn-primary">
                <button type="button" value="Voltar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
        </div>
    </div>
</body>
</html>
