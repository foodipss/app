<?php
  
  $conn = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b74a37105022bd", "c0139137", "heroku_af588fa1a66d1f3");
  
  $idfonte=$_GET['idfonte'];
  
 $query = "SELECT idfonte, nomefonte, moradafonte, emailfonte, contactofonte FROM fonte WHERE idfonte='$idfonte'";
  
  $resultado=$conn->query($query);
  
  $row=$resultado->fetch_assoc();

?>



<form action="editFonte2.php" method="post" id="editFonte2">
<table id="tabelaeditFonte">
                  
<table border="0" width="100%">
  <tr>
    <input type="hidden" name="idfonte" value="<?php echo $idfonte; ?>">
    
    <td ><b>Nome da Fonte</b></td> 
    <td ><input type="text" name="nomefonte" size="25" value="<?php echo $row['nomefonte']; ?>"/></td>
  </tr>
  
  <tr>
    <td width="20"><b>Morada</b></td>
    <td width="30"><input type="text" name="moradafonte" size="25" value="<?php echo $row['moradafonte']; ?>"/>
    </td>
  </tr>

  <tr>
    <td width="20"><b>Email</b></td>
    <td width="30"><input type="text" name="emailfonte" maxlength="9" size="25" value="<?php echo $row['emailfonte']; ?>"/>
    </td>
  </tr>

   <tr>
    <td width="20"><b>Telefone</b></td>
    <td width="30"><input type="text" name="contactofonte" maxlength="9" size="25" value="<?php echo $row['contactofonte']; ?>"/>
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



  
</script>
</body>
</html>