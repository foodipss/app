<?php
session_start();
include_once("conexaoPesquisa.php");
                      	
if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["idBem"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["idBem"],
                    'item_name' => $_POST["hidden_name"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="refeicoes.php"</script>';
            }else{
                echo '<script>alert("Atenção!Bem alimentar já adicionado.")</script>';
                echo '<script>window.location="refeicoes.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["idBem"],
                'item_name' => $_POST["hidden_name"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["idBem"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Bem removido com sucesso!")</script>';
                    echo '<script>window.location="refeicoes.php"</script>';
                }
            }
        }
    }
?>
<!DOCTYPE html>
    <html>

    <title>REFOOD</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    
	         <style>
h1 {
  color: black;
  font-family: ariana;
  font-weight: bold;
  
}
   </style>
    </head>

    <body>
        <?php
			require_once "indexVoluntario.php";
		?>

            <div style="width: 100%;">
                <div style="float: left; width: 30%;">
                    <table>
                        <tr>
                            <th>Beneficiário</th>
                        </tr>

                        <tr>
                            <td>
                            	
                                <form method="POST" action="refeicoes.php">
                                    <input list="browsers" class="btn btn-default btn-lg" name="codigo_beneficiario">
                                    <datalist id="browsers">
                                        <?php 
								$result = $conn->query("SELECT codigo_beneficiario, nome FROM beneficiario WHERE visivel='1'");
								while($rows = $result->fetch_assoc()) {
									$codigo = $rows['codigo_beneficiario'];
									echo "<option value='$codigo'></option>";
								}
							?>
                                    </datalist>
                                    <input name="SendPesqUser" type="submit" class="btn btn-warning btn-lg" value="Pesquisar">
                                </form>
                            </td>
                        </tr>
                        <?php
							$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
							if($SendPesqUser){
								$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
								$query = "SELECT idBeneficiario, codigo_beneficiario, restricoes FROM beneficiario WHERE codigo_beneficiario ='$codigo_beneficiario' ";
								$resultado_row_beneficiario = mysqli_query($conn, $query) or die(mysqli_error($conn));
								$row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
							
						?>
                            <tr>
                                <td>
                                    <br>
					<br>
					<p style="font-weight: bold;" >Informações Pessoais do Beneficiário selecionado</p>
					
					
                                    Código Beneficiário: 
                                    <?php 
                                        echo $row_beneficiario['codigo_beneficiario'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Restrições: 
                                    <?php 
                                        echo $row_beneficiario['restricoes'];
                                    }
                                    ?>
                                </td>
                            </tr>
                    </table>
                </div>

                <div style="float: left; width: 40%;">
                    <table style="width:90%" class="table">
                        <tr>
                            <th>Histórico</th>
                        </tr>
                        <tr>
							<?php
								$dia= date("d");
								$mes= date("m");
							?>

                            <td>

								<?php echo date('d-m', mktime(0,0,0,$mes,($dia-5))); ?>
								<?php
                                    $row_data5=0;
									$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
										if($SendPesqUser){
											$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
											$resultado_data5 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem AND r.data=subdate(current_date, 5)";
											$resultado_data5 = mysqli_query($conn, $resultado_data5) or die(mysqli_error($conn));
											$row_data5 = mysqli_fetch_assoc($resultado_data5);
										}
								?>
                            </td>
                            <td>
								<?php echo date('d-m', mktime(0,0,0,$mes,($dia-4))); ?>
                                <?php
                                $row_data4=0;
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data4 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem AND r.data=subdate(current_date, 4)";
										$resultado_data4 = mysqli_query($conn, $resultado_data4) or die(mysqli_error($conn));
										$row_data4 = mysqli_fetch_assoc($resultado_data4);
									}
								?>
                            </td>
                            <td>
								<?php echo date('d-m', mktime(0,0,0,$mes,($dia-3))); ?>
                                <?php
                                $row_data3=0;
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data3 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem AND r.data=subdate(current_date, 3)";
										$resultado_data3 = mysqli_query($conn, $resultado_data3) or die(mysqli_error($conn));
										$row_data3 = mysqli_fetch_assoc($resultado_data3);
									}
								?>
                            </td>
                            <td>
								<?php echo date('d-m', mktime(0,0,0,$mes,($dia-2))); ?>
                                <?php
                                $row_data2=0;
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data2 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem AND r.data=subdate(current_date, 2)";
										$resultado_data2 = mysqli_query($conn, $resultado_data2) or die(mysqli_error($conn));
										$row_data2 = mysqli_fetch_assoc($resultado_data2);
									}
								?>
                            </td>
                            <td>
								<?php echo date('d-m', mktime(0,0,0,$mes,($dia-1))); ?>
                                <?php
                                $row_data1=0;
								$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
									if($SendPesqUser){
										$codigo_beneficiario = filter_input(INPUT_POST, 'codigo_beneficiario', FILTER_SANITIZE_STRING);
										$resultado_data1 = "SELECT r.data, b.nomeBem FROM refeicao r, bem b, beneficiario n WHERE codigo_beneficiario ='$codigo_beneficiario' AND r.idBenef = n.idBeneficiario AND r.idBem = b.idBem AND r.data=subdate(current_date, 1)";
										$resultado_data1 = mysqli_query($conn, $resultado_data1) or die(mysqli_error($conn));
										$row_data1 = mysqli_fetch_assoc($resultado_data1);
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $row_data5['nomeBem']; ?>
                            </td>
                            <td>
                                <?php echo $row_data4['nomeBem']; ?>
                            </td>
                            <td>
                                <?php echo $row_data3['nomeBem']; ?>
                            </td>
                            <td>
                                <?php echo $row_data2['nomeBem']; ?>
                            </td>
                            <td>
                                <?php echo $row_data1['nomeBem']; ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="float: left; width: 30%;">
                    <table>
						<tr>
							<th>Cesto</th>
						</tr>
                        <?php
                            if(!empty($_SESSION["cart"])){
                                foreach ($_SESSION["cart"] as $key => $value) {
                                    ?>
                                    <tr>
					    <?php
					$query = "SELECT idBeneficiario, restricoes FROM beneficiario";
					$resultado_row_beneficiario = mysqli_query($conn, $query) or die(mysqli_error($conn));
					$row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
							
					?>
									<form method="POST" action="registo_refeicao.php">
                                        <td><?php echo $value["item_name"]; ?></td>
										<input type="hidden" name="idBem" value= "<?php echo $value["product_id"]; ?>" >
										<input type="hidden" name="idBenef" value= "<?php echo $row_beneficiario["idBeneficiario"]; ?>" >
										<td>
											<button type="submit" class="btn-warning btn-lg">Adicionar</button>
										</td>
									</form>
										<td>
											<a href="refeicoes.php?action=delete&idBem=<?php echo $value["product_id"]; ?>"><button class="btn-warning btn-lg">Eliminar</button></a>
										</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                            <?php
                                }
                            ?>
                    </table>
                </div>
            </div>

            <div style="width: 100%;">
                
                <div style="float: left; width: 100%;">
                    <table>
			    <br>
                        <tr>
                            <th>Pratos do dia</th>
                        </tr>
                    </table>
                </div> 
                <div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Sopas'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				<div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Carne'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				<div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Peixe'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				<div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Acompanhamento'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				<div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Composto'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				<div style="float: left; width: 16%;">
					<?php
                        $query = "SELECT * FROM bem WHERE visivel='1' AND tipoBem='Outros'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form method="post" action="refeicoes.php?action=add&idBem=<?php echo $row["idBem"]; ?>">
						<div class="product">
                            <h5 class="text-info"><?php echo $row["nomeBem"]; ?></h5>
							<input type="hidden" name="hidden_name" value="<?php echo $row["nomeBem"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn-warning btn-lg" value="+">
                        </div>
                    </form>
					<?php
						}
						}
					?>
                </div>
				
        </div>
    </body>
</html>
