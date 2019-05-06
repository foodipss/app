<!DOCTYPE HTML>
<html lang="pt-pt">
 <head>
	<style>
		body{
			background: url("img/ola.png");
			background-size: 100%;
			float: right;
			position: relative;
			top: 300px;
			left: -500px;
			font-size: 18px;
		}
		
	</style>
 
   <link rel="stylesheet" href="css/estiloLogin.css">
    </head>
  <body>
  
<div class="w2-col.s4">
      
	   <div class="form">
	   <form method="post">
    <div class="form-group">
      <label for="username"></label>
      <input type="text" name="user" class="form-control" placeholder="UTILIZADOR">
    </div>
	
	<br>
    <div class="form-group">
      <label for="pwd"></label>
      <input type="password" name="password" class="form-control" placeholder="PASSWORD">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Lembrar o meu acesso</label>
    </div>
    <button type="submit"  class="btn btn-default">  Entrar </button>
    
    

  </form>
	  </div>
 </div>
 
<!--
<div class="linha">
    <section>
        <p><h3>Login</h3></p>
    <form method='post'>
        <div class="coluna col5 sidebar">
            <input type="text" name="user" placeholder='Username'><br>
            <br>
            <input type="password" name="password" placeholder="Password"><br>
            <br> <br>
            <input type="submit" value="Submeter">
            <input type="submit" value="Cancelar" name="canc">
           
			<?php 
           if (isset($valido) && (!$valido)) {
                   echo'Dados invalidos, pf tente novamente!';
            }
          ?>
    </form>
    </section>   


</div>
-->
<div class="container">
<div class="linha">

<section>
		
<div class="coluna col4 sidebar">


</div>
</section>
</div>
</div>

<?php
include_once 'funcoes_bd.php';
session_start();

if (isset($_GET['logout']) || isset($_POST['canc'])) {
    session_destroy();
    header("Location: login.php");
} else {
    if (isset($_POST['user'])) {
        $tipo_utilizador = $_POST['user'];
        $password = $_POST['password'];
        $_SESSION['tipo_utilizador'] = $tipo_utilizador;
        $dados = utilizador_valido($tipo_utilizador, $password);
        
        
        if ($dados) {
            $valido = TRUE;
            if ($_SESSION['tipo_utilizador'] == 'Administrador') {
					header ("Location: analise.php");
            } else if ($_SESSION['tipo_utilizador'] == 'Voluntario') {
					header ("Location: analise2.php");
        
        
    } else {
        $valido = FALSE;
    }
}
}} 
?>

</div>

	

</body>
</html>
