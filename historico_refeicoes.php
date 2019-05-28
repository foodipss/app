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

    
   <center> <h5><b> Histórico de refeições </b></h5></center>
    <p>
  </header>


<!-- Ligação Base de dados -->
<?php
require('conexao_perfil.php');
// pegar a pagina atual
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
$itens_por_pagina = 5;
$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;

$idBeneficiario=$_GET['idBeneficiario'];

$query = "SELECT refeicao.idRefeicao, refeicao.idBem, refeicao.idBenef, refeicao.data, beneficiario.idBeneficiario, beneficiario.codigo_beneficiario, bem.idBem, bem.nomeBem, bem.idFonte
FROM refeicao, beneficiario, bem
WHERE refeicao.idBenef=$idBeneficiario AND refeicao.idBenef = beneficiario.idBeneficiario AND beneficiario.idBeneficiario=$idBeneficiario AND refeicao.idBem = bem.idBem
ORDER BY refeicao.data DESC
LIMIT $inicio, $itens_por_pagina"; 


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
          <th>Nome Bem</th>
          <th>Cod Fonte</th>
          <th>Codigo Beneficiario</th>
          <th>data</th>
        </tr>
      </thead>
  <tbody>
  <?php while($row=$resultado->fetch_assoc()){ ?>
    <tr>
         <td><?php echo $row['nomeBem'];?></td>
          <td><?php echo $row['idFonte'];?></td>
        <td><?php echo $row['codigo_beneficiario'];?></td>
        <td><?php echo $row['data'];?></td>

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

      <a href="historico_refeicoes.php?idBeneficiario=<?php echo $idBeneficiario;?>&pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="historico_refeicoes.php?idBeneficiario=<?php echo $idBeneficiario;?>&pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="historico_refeicoes.php?idBeneficiario=<?php echo $idBeneficiario;?>&pagina=<?php echo $pagina_seguinte ; ?>">
        <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>

    <?php } ?>

    </li>


  </ul>
</nav>
</div>
</html>