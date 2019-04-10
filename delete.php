<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af588fa1a66d1f3', 'b74a37105022bd', 'c0139137');
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
