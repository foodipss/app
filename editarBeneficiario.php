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
    <center><h5><b><i class="fa fa-dashboard"></i> Editar Informações </b></h5></center>
  </header>

  
<?php
  require('conexao_perfil.php');
  
  $idBeneficiario=$_GET['idBeneficiario'];
  
  $query="SELECT idBeneficiario, codigo_beneficiario, nome, morada, telefone, nr_elementos_agregado, restricoes FROM beneficiario WHERE idBeneficiario='$idBeneficiario'";
  
  $resultado=$mysqli->query($query);
  
  $row=$resultado->fetch_assoc();
?>



<form action="editarBeneficiario2.php" method="post" id="editarBeneficiario2">
<table id="tabelaEditarBeneficiario">
                  
<table border="0" width="100%">
  <tr>
    <input type="hidden" name="idBeneficiario" value="<?php echo $idBeneficiario; ?>">
    
    <td ><b>Código Beneficiário</b></td> 
    <td ><input type="text" name="codigo_beneficiario" size="25" value="<?php echo $row['codigo_beneficiario']; ?>"/></td>
  </tr>
  

  <tr>
    <td width="20"><b>Nome</b></td>
    <td width="30"><input type="text" name="nome" size="25" value="<?php echo $row['nome']; ?>"/>
    </td>
  </tr>

  <tr>
    <td width="20"><b>Morada</b></td>
    <td width="30"><input type="text" name="morada" size="25" value="<?php echo $row['morada']; ?>"/>
    </td>
  </tr>

  <tr>
    <td width="20"><b>Telefone</b></td>
    <td width="30"><input type="text" name="telefone" maxlength="9" size="25" value="<?php echo $row['telefone']; ?>"/>
    </td>
  </tr>

  <tr>
    <td width="20"><b>Número Elementos Agregado</b></td>
    <td width="30"><input type="text" name="nr_elementos_agregado" size="25" value="<?php echo $row['nr_elementos_agregado']; ?>"/>
    </td>
  </tr>

    <tr>
    <td width="20"><b>Restrições Alimentares</b></td>
    <td width="30"><input type="text" name="restricoes" size="25" value="<?php echo $row['restricoes']; ?>"/>
    </td>
  </tr>

                </table>
                <p></p>
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Concluir alterações" id="validar" class="btn btn-primary">
                <button type="button" value="Voltar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
        </div>
    </div>
</body>
</html>