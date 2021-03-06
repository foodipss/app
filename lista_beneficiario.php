<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
 
  <?php require_once "index.php"; ?>
</body>


  <!-- Header -->
  <header class="w3-container" style="padding-top:40px">

<style>
h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
button {
    width: 20%;
    background-color: #FFBF00;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
   </style>

    
   <center> <h5><b> Lista de Beneficiário </b></h5></center>
    <p>
  </header>


<!-- Ligação Base de dados -->
<?php
require('conexao_perfil.php');
// pegar a pagina atual
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$itens_por_pagina = 5;
$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;
$query="SELECT idBeneficiario, nome, morada, telefone, nr_elementos_agregado, nr_elementos_criancas, codigo_beneficiario, restricoes FROM beneficiario where visivel='1' ORDER BY codigo_beneficiario LIMIT $inicio, $itens_por_pagina"; 
$resultado=$mysqli->query($query)or die($mysqli->error);
$num_total = mysqli_num_rows($resultado);
//defifnir o numero de paginas
$num_paginas = ceil($num_total/$itens_por_pagina);
?>


<div class="colunaListaBeneficiario">
  <p></p>

    <table class="table">

      <thead>
        <tr>
          <th>Código Beneficiário</th>
          <th>Nome</th>
          <th>Morada</th>
          <th>Telefone</th>
          <th>Número de Adultos</th>
          <th>Número de Criancas</th>
          <th>Restrições Alimentares</th>
          <th colspan=3>Operações</th>
        </tr>
      </thead>
  <tbody>
  <?php while($row=$resultado->fetch_assoc()){ ?>
    <tr>

        <td><?php echo $row['codigo_beneficiario'];?> </td>
        <td><?php echo $row['nome'];?></td>
        <td><?php echo $row['morada'];?></td>
        <td><?php echo $row['telefone'];?></td>
        <td><?php echo $row['nr_elementos_agregado'];?></td>
        <td><?php echo $row['nr_elementos_criancas'];?></td>
        <td><?php echo $row['restricoes'];?></td>


  <td>
    <a href="editarBeneficiario.php?idBeneficiario=<?php echo $row['idBeneficiario'];?>"  class="fa fa-edit" style="font-size:24px;color:black"> </a>
  </td>
    <td>
    <a href="apagarBeneficiario.php?idBeneficiario=<?php echo $row['idBeneficiario'];?>" class="fa fa-trash-o" style="font-size:24px;color:red"> </a>
  </td>
   <td>
    <a href="historico_refeicoes.php?idBeneficiario=<?php echo $row['idBeneficiario'];?>" class="fa fa-bars" style="font-size:24px;color:black"> </a>
  </td>
</tr>

<?php }?>

  </tbody>
  </table>

<?php
$pagina_anterior = $pagina - 1;
$pagina_seguinte = $pagina + 1;
?>

<nav class="text-center">
  <ul class="pager">
    <li class="previous">  

    <?php 
      if ($pagina_anterior != 0){ ?>

      <a href="lista_beneficiario.php?pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="lista_beneficiario.php?pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="lista_beneficiario.php?pagina=<?php echo $pagina_seguinte ; ?>">
        <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>

    <?php } ?>

    </li>


  </ul>
</nav>
</div>
<form method="get" action="novoBeneficiario.php" >
    <button type="submit">Registar Novo Beneficiário</button>
</form>


</html>
