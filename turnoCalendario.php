<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=heroku_af588fa1a66d1f3;host=us-cdbr-iron-east-03.cleardb.net","b74a37105022bd","c0139137");

$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

switch($accion){
	case 'agregar':
	
		$sentenciaSQL = $pdo->prepare("INSERT INTO
		turno(title,descripcion,color,textColor,start,end)
		VALUES(:title,:descripcion,:color,:textColor,:start,:end)");
		
		$respuesta=$sentenciaSQL->execute(array(
			"title" =>$_POST['title'],
			"descripcion" => $_POST['descripcion'],
			"color" => $_POST['color'],
			"textColor" => $_POST['textColor'],
			"start" => $_POST['start'],
			"end" => $_POST['end']
		));
		echo json_encode($respuesta);
		break;
	
	case 'eliminar':
		//echo "Instrução Eliminar";
		$respuesta=false;
		
		if(isset($_POST['id'])){
			$sentenciaSQL= $pdo->prepare("DELETE FROM turno WHERE ID=:ID");
			$respuesta= $sentenciaSQL->execute(array("ID"=>$_POST['id']));
			
		}
		echo json_encode($respuesta);
		
		break;
	case 'modificar':
	
	
		$sentenciaSQL = $pdo->prepare("UPDATE turno SET
		title=:title,
		descripcion=:descripcion,
		color=:color,
		textColor=:textColor,
		start=:start,
		end=:end
		WHERE ID=:ID
		");
		
		$respuesta=$sentenciaSQL->execute(array(
		"ID" =>$_POST['id'],
		"title" =>$_POST['title'],
		"descripcion" =>$_POST['descripcion'],
		"color" =>$_POST['color'],
		"textColor" =>$_POST['textColor'],
		"start" =>$_POST['start'],
		"end" =>$_POST['end']
	
	));
	echo json_encode($respuesta);
	
	
	break;
default:
	
		$sentenciaSQL= $pdo->prepare("SELECT * FROM turno");
		$sentenciaSQL->execute();

		$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($resultado);
	break;
	
}

?>
