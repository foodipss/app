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

	    
input[type=text] {
  width: 20%;
  background-color: #FFBF00;
  color: white;
  padding: 14px 20px;
  
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=text]:hover {
  background-color: #FF8000;
}

</style>
    
  <center> <h5><b> Registar Novo Voluntário </b></h5></center>
  </header>

  
            <form action="QueryVoluntario.php" method="post" id="func">
                <table id="tableFunc">
                  
                    <tr>
                        <td>    <div class="form-group">
                                
                                <label for='nome'>Nome</label>
                          <br>
			  <br>
                                <input type="text" name="nome" class="form-control" id="nome">
                       </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                              <br>
			      <br>
                                <input type="text" name="telefone" maxlength="9" class="form-control" id="telefone">
                            </div>
                       </td>
                       </tr>
                       <tr>

            <td>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                              <br>
            <br>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                       </td>
                     </tr>
                     <tr>
                       <td>
                            <div class="form-group">
                                <label for="morada">Morada</label>
                              <br>
            <br>
                                <input type="text" name="morada" class="form-control" id="morada">
                            </div>
                       </td>


                    </tr>
                    
                  
                </table>
                <p></p>
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Registar Voluntario" id="validar" class="btn btn-primary">
                <input type="submit" value="Cancelar" onClick="history.go(-1)" class="btn btn-primary"></input>
            </form>
        </div>
    </div>
</body>
</html>
