<?php
session_start();
include_once("conexaoPesquisa.php");
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
    </head>

    <body>
        <?php
			require_once "index.php";
		?>

            <div style="width: 100%;">
                <div style="float: left; width: 30%;">
                    <table>
                        <tr>
                            <th>Beneficiário</th>
                        </tr>

                        <tr>
                            <td>
                                <form method="POST" action="">
                                    <input list="browsers" class="btn btn-default btn-lg" name="codigo_beneficiario">
                                    <datalist id="browsers">
                                        <?php 

								$result = $conn->query("SELECT codigo_beneficiario, nome FROM beneficiario WHERE visivel='1'");

								while($rows = $result->fetch_assoc()) {
									$codigo = $rows['codigo_beneficiario'];
									$nome = $rows['nome'];
									echo "<option value='$codigo'>$nome</option>";
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
								$resultado_row_beneficiario = "SELECT codigo_beneficiario, restricoes FROM beneficiario WHERE codigo_beneficiario ='$codigo_beneficiario' ";
								$resultado_row_beneficiario = mysqli_query($conn, $resultado_row_beneficiario) or die(mysqli_error($conn));
								$row_beneficiario = mysqli_fetch_assoc($resultado_row_beneficiario);
							}
						?>
                            <tr>
                                <td>
                                    Código
                                    <?php echo $row_beneficiario['codigo_beneficiario'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Restrições
                                    <?php echo $row_beneficiario['restricoes'];?>
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
								<?php
									echo date('d-m', mktime(0,0,0,$mes,($dia-5)));	
								?>
								<?php
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
								<?php
									echo date('d-m', mktime(0,0,0,$mes,($dia-4)));	
								?>
                                <?php
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
								<?php
									echo date('d-m', mktime(0,0,0,$mes,($dia-3)));	
								?>
                                <?php
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
								<?php
									echo date('d-m', mktime(0,0,0,$mes,($dia-2)));	
								?>
                                <?php
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
								<?php
									echo date('d-m', mktime(0,0,0,$mes,($dia-1)));	
								?>
                                <?php
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
                                <?php echo $row_data5['nomeBem'];?>
                            </td>
                            <td>
                                <?php echo $row_data4['nomeBem'];?>
                            </td>
                            <td>
                                <?php echo $row_data3['nomeBem'];?>
                            </td>
                            <td>
                                <?php echo $row_data2['nomeBem'];?>
                            </td>
                            <td>
                                <?php echo $row_data1['nomeBem'];?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="float: left; width: 30%;">
                    <table>
                        <tr>
                            <th>Cesto</th>
                        </tr>

                        <tr>
                            <td>
                                <?php
								$cesto = "";

								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$cesto = test_input($_POST["cesto"]);
								}

								function test_input($data) {
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									return $data;
								}
							?>

                                    <?php
								echo $cesto;
							?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="width: 100%;">
                <div style="float: left; width: 100%;">
                    <table>
                        <tr>
                            <th>Pratos do dia</th>
                        </tr>
                    </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
					$sopa = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Sopas'";
					$conexaosopa = $conn->query($sopa) or die($conn->error);
				?>
                        <table>
                            <tr>
                                <th>Sopa</th>
                            </tr>
                            <?php while ($alimentos_sopa = $conexaosopa->fetch_array()) { ?>
                                <tr>
                                    <td>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                            <input style="padding: 10px" name="cesto" value="<?php echo $alimentos_sopa['nomeBem']?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
			$carne = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Carne'";
			$conexaocarne = $conn->query($carne) or die($conn->error);
		?>
                        <table>
                            <tr>
                                <th>Carne</th>
                            </tr>
                            <?php while ($alimentos = $conexaocarne->fetch_array()) { ?>
                                <tr>
                                    <td>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                            <input style="padding: 10px" name="cesto" value="<?php echo $alimentos['nomeBem']?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
			$peixe = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Peixe'";
			$conexaopeixe = $conn->query($peixe) or die($conn->error);
		?>
                        <table>
                            <tr>
                                <th>Peixe</th>
                            </tr>
                            <?php while ($alimentos = $conexaopeixe->fetch_array()) { ?>
                                <tr>
                                    <td>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                            <input style="padding: 10px" name="cesto" value="<?php echo $alimentos['nomeBem']?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
			$acompanhamento = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Acompanhamento'";
			$conexaoacompanhamento = $conn->query($acompanhamento) or die($conn->error);
		?>
                        <table>
                            <tr>
                                <th>Acompanhamento</th>
                            </tr>
                            <?php while ($alimentos = $conexaoacompanhamento->fetch_array()) { ?>
                                <tr>
                                    <td>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                            <input style="padding: 10px" name="cesto" value="<?php echo $alimentos['nomeBem']?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
			$composto = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Composto'";
			$conexaocomposto = $conn->query($composto) or die($conn->error);
		?>
                        <table>
                            <tr>
                                <th>Composto</th>
                            </tr>
                            <?php while ($alimentos = $conexaocomposto->fetch_array()) { ?>
                                <tr>
                                    <td>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                            <input style="padding: 10px" name="cesto" value="<?php echo $alimentos['nomeBem']?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                </div>

                <div style="float: left; width: 16%;">
                    <?php 
						$outro = "SELECT nomeBem FROM bem WHERE visivel='1' AND tipoBem='Outros'";
						$conexaooutro = $conn->query($outro) or die($conn->error);
					?>
                    <table>
                        <tr>
                            <th>Outro</th>
                        </tr>
                        <?php while ($alimentos = $conexaooutro->fetch_array()) { ?>
                            <tr>
                                <td>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
										<input style="padding: 10px" name="cesto" value="<?php echo $alimentos['nomeBem']?>">
                                </td>
                                <td>
                                    <input type="submit" name="submit" class="btn-warning btn-lg" value="+">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
    </body>

    </html>