<!DOCTYPE html>
<html>
<title>REFOOD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-orange w3-large" style="z-index:4">
   <button class="w3-bar-item w3-button w3-orange w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> <a href="index.php"></button>
 
    <li><a class="w3-bar-item w3-right" href="logout.php">Logout</a></li>
</div>

<!-- Sidebar/menu  -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/profile.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bem-vindo, <strong>Carina </strong></span><br>
      <a href="" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
 
  <div class="w3-bar-block">
      
    <a href="registarFontes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i> Fontes</a>
    <a href="registarTupp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Tupperwares</a>
    <a href="refeicoes.php" class="w3-bar-item w3-button w3-padding w3-orange"><i class="fa fa-users fa-fw"></i>  Refeições</a>
    <a href="benefeciario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Benefeciários</a>
    <a href="voluntario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Voluntários</a>
    <a href="indexCalendario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Turnos</a>
    <a href="analise.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Análises</a>
    <a href="ajuda.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Ajuda</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">



  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
   
  </footer>
 
  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
