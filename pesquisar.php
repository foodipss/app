<?php
session_start();
include_once("conexaoPesquisa.php");
?>


<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header>
<style>
h5 {
  color: black;
  text-align: center;
  font-family: ariana;
  font-size: 30px;
}
 button[type=submit],  input[type=submit] {
	
  width: 20%;
  color: white;
  padding: 10px 25px;
  margin: 8px 0;
  background-color:#FFBF00;
  border: 1px solid #ccc;
  border-radius: 4px;

}


input {
  width: 20%;
  padding: 10px 25px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 3px;

}

button[type=submit]:hover {
  background-color: #FF8000;
}

input[type=submit]:hover {
  background-color: #FF8000;
}

</style>

</header>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript">




	$(document).ready(function() {
    $('#tabela').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "proc_registar.php",
            "type": "POST"
        }
    } );
} );
</script>

	<body>
		<?php require_once "index.php"; ?>
	
		
		<div style="width: 100%;">


		<form method="POST" action="">
			<label class="btn warning btn-lg">Beneficiário: </label>
			<input list="browsers" class="btn btn-default btn-lg" name="codigo_beneficiario">
			<input type="submit" name="SendPesqUser" value="Pesquisar">
			<datalist id="browsers" >
			<?php 
			
			$result = $conn->query("SELECT codigo_beneficiario, nome FROM beneficiario WHERE visivel='1'");

			while($rows = $result->fetch_assoc()) {
				$codigo = $rows['codigo_beneficiario'];
			    $nome = $rows['nome'];
				echo "<option value='$codigo'>$nome</option>";
			}
			?>	
			</datalist>
			<br>
			<br>
		</form>
	</div>


		<table id="tabela" class="display" style="width:100%">
			
		
			<?php


			// pegar a pagina atual
			$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

			$itens_por_pagina = 5;

			$inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;


			$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		if($SendPesqUser){

			$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
			$resultado_row_beneficiario = "SELECT * from beneficiario where codigo_beneficiario ='$codigo_beneficiario'";
			

			$resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
			$row_row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
		
			$result_row_tupperware = "SELECT b.nome, b.telefone, t.quantidadeLevou, t.quantidadeEntregue, t.isRecolha, t.data from beneficiario b, tupperware t where b.codigo_beneficiario ='$codigo_beneficiario' and b.idBeneficiario = t.idBeneficiario order by t.idTupperware desc LiMIT $inicio, $itens_por_pagina";
			

			$resultado_row_tupperware = mysqli_query($conn, $result_row_tupperware) or die(mysqli_error($conn));
			
			$num_total = mysqli_num_rows($resultado_row_tupperware);

			//defifnir o numero de paginas
			$num_paginas = ceil($num_total/$itens_por_pagina);
		 


			$resultado = mysqli_query($conn, "SELECT sum(quantidadeLevou), sum(quantidadeEntregue) from beneficiario b, tupperware t where b.codigo_beneficiario ='$codigo_beneficiario' and b.idBeneficiario = t.idBeneficiario order by t.idTupperware desc");
 
 
 			$saldo = 0;

		    while($linhas = mysqli_fetch_array($resultado)){			
				$saldo = $linhas["sum(quantidadeLevou)"] - $linhas["sum(quantidadeEntregue)"];					
				};
			?>

			<p> <b>Benefiário:</b> <?php echo $row_row_beneficiario['nome'];?> </p>
			<p> <b>Contacto:</b> <?php echo $row_row_beneficiario['telefone'];?> </p>
			<p> <b>Tupperwares em Falta:</b><?php echo $saldo;?></p>
			<br>
			<tr>
				<td>Data</td>
				<td>Entregou?</td>
				<td>Quantidade entregue</td>
				<td>Levou</td>
			</tr>

			<?php
			
			while($row_row_tupperware = mysqli_fetch_assoc($resultado_row_tupperware)){
			?>
			 <tr>
				<td><?php echo $row_row_tupperware['data'];  ?></td>
				<td><?php if($row_row_tupperware['isRecolha']=="1"){echo "Sim";}else{echo "Não";}; ?></td>
				<td><?php echo $row_row_tupperware['quantidadeEntregue']; ?></td>
				<td><?php echo $row_row_tupperware['quantidadeLevou']; ?></td>
			</tr>
						
			<?php
			}
			?>
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

      <a href="pesquisar.php?pagina=<?php echo $pagina_anterior; ?>" >
       <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-left" style="color:#000000"></span>

    <?php } ?>

    </li>
    <?php 
      //Apresentar a paginação
      for($i = 1; $i < $num_paginas; $i++) { ?>
      <li><a href="pesquisar.php?pagina=<?php echo $i; ?>"><?php echo $i ; ?></a></li>
      <?php } ?>

      <li class="next">  

    <?php 
      if ($pagina_seguinte <= $num_total){ ?>

      <a href="pesquisar.php?pagina=<?php echo $pagina_seguinte ; ?>">
        <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>
      </a>

    <?php }else { ?>
      <span class="glyphicon glyphicon-chevron-right" style="color:#000000"></span>

    <?php } ?>

    </li>


  </ul>
</nav>

		<form method="POST" action="proc_registar.php">
			<br>
			<label>Beneficiario: </label>
			<br>
			<input type="hidden" name="idBeneficiario"   value="<?php echo $row_row_beneficiario['idBeneficiario'];?>"><br><br>
			<label>A entregar: </label>
			<br>
			<input type="hidden" name="deviaOntem"   value="<?php echo $saldo;?>"><br><br>
			<label>Devia: </label>
			<br>
			<input name="quantidadeEntregue"  value="<?php echo $saldo;?>"><br><br>
			<label>Levou: </label>
			<br>
			<input name="quantidadeLevou" value=""><br><br>

			<button type="submit"  data-toggle="modal" data-target="#myModal">Registar</button>
		</form>	
</div>

		<?php
		}
		?>



	</body>

</html>
