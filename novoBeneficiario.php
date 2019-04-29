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
  <center> <h5><b><i class="fa fa-dashboard"></i> Registar Novo Voluntário </b></h5></center>
  </header>

  
            <form action="QueryBeneficiario.php" method="post" id="beneficiario">
                <table id="tableBeneficiario">
                  <tr>
                        <td>    <div class="form-group">
                                
                                <label for='codigo_beneficiario'>Código Beneficiário</label>
                                <input type="text" name="codigo_beneficiario" class="form-control" id="codigo_beneficiario" placeholder="Código Beneficiário">
                       </div>
                        </td>

                    </tr>
                    <tr>
                        <td>    <div class="form-group">
                                
                                <label for='nome'>Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                       </div>
                        </td>

                    </tr>

                    <tr>
                        <td>    <div class="form-group">
                                
                                <label for='nome'>Morada</label>
                                <input type="text" name="morada" class="form-control" id="morada" placeholder="Morada">
                       </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input name="telefone" maxlength="9" class="form-control" id="telefone" placeholder="Telefone">
                            </div>
                       </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="telefone">Número Elementos Agregado</label>
                                <input name="nr_elementos_agregado" class="form-control" id="nr_elementos_agregado" placeholder="Nr Elementos Agregado">
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