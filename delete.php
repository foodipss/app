<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');
 $query = "
 DELETE from turno WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>