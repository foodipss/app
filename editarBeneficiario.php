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
    <center><h5><b> Editar Informações </b></h5></center>
  </header>
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
  
<?php
  require('conexao_perfil.php');
  
  $idBeneficiario=$_GET['idBeneficiario'];
  
  $query="SELECT idBeneficiario, codigo_beneficiario, nome, morada, telefone, nr_elementos_agregado, restricoes FROM beneficiario WHERE idBeneficiario='$idBeneficiario'";
  
  $resultado=$mysqli->query($query);
  
  $row=$resultado->fetch_assoc();
?>



<form action="editarBeneficiario2.php" method="post" id="editarBeneficiario2">

    <input type="hidden" name="idBeneficiario" value="<?php echo $idBeneficiario; ?>">
    
    Código Beneficiário:
  <br>
    <input type="text" name="codigo_beneficiario" value="<?php echo $row['codigo_beneficiario']; ?>"/>
  <br/>
  
Nome:
  <br>
    <input type="text" name="nome"  value="<?php echo $row['nome']; ?>"/>
<br/>
      
    Morada:
  <br>
    <input type="text" name="morada"  value="<?php echo $row['morada']; ?>"/>
   <br/>
  
  Telefone:
  <br>
    <input type="text" name="telefone" maxlength="9" value="<?php echo $row['telefone']; ?>"/>
  <br/>
  
  Número de Adultos:
    <input type="text" name="nr_elementos_agregado" value="<?php echo $row['nr_elementos_agregado']; ?>"/>
   <br/>
 Número de Criancas:
    <input type="text" name="nr_elementos_criancas" value="<?php echo $row['nr_elementos_criancas']; ?>"/>
   <br/>
  
  Restrições Alimentares:
  <br>
  <input type="text" name="restricoes"  value="<?php echo $row['restricoes']; ?>"/>
  <br/>
  
                <input type='hidden' name='query' value="NovoVoluntario">
                <input type="submit" value="Concluir alterações" id="validar" class="btn btn-primary">
                <button type="button" value="Voltar" onClick="history.go(-1)" class="btn btn-primary"> Cancelar </button>
            </form>
     
</body>
</html>
