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

  
            <form action="QueryVoluntario.php" method="post" id="func">
                <table id="tableFunc">
                  <tr>
                        <td>    <div class="form-group">
                                
                                <label for='codigoVoluntario'>Código Voluntário</label>
                                <input type="text" name="codigoVoluntario" class="form-control" id="codigoVoluntario" placeholder="Código Voluntário">
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
                        <td>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input name="telefone" maxlength="9" class="form-control" id="telefone" placeholder="Telefone">
                            </div>
                       </td>

                    </tr>
                    
                  
                </table>
                <p></p>
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Registar Voluntario" id="validar" class="btn btn-primary">
                <button type="button" value="Voltar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
        </div>
    </div>
</body>
</html>