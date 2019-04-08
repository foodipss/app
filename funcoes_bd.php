<?php


define('MYSQL_SERVER', 'PTSI');
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DATABASE', 'test');

function ligar_base_dados() {
    $ligacao = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE) or die('Erro ao ligar ao servidor...');
    return $ligacao;
	echo $ligacao;
}

function utilizador_valido($username, $password) {
    $ligacao = ligar_base_dados();
    $expressao = "SELECT * FROM utilizador WHERE username='$username' AND password='$password'";
    $resultado = mysqli_query($ligacao, $expressao);
    $valor_retorno = false;

    if (mysqli_num_rows($resultado) > 0) {
	
        $dados = mysqli_fetch_assoc($resultado);
        if ($dados['password'] == $password) {
		$_SESSION['tipo_utilizador']=$dados['tipo_utilizador'];
            $valor_retorno = $dados;
		
        }
    }
      mysqli_free_result($resultado);
            mysqli_close($ligacao);
            return $valor_retorno;
}

?>