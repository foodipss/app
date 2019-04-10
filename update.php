<?php

//update.php

$connect = new PDO('mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af588fa1a66d1f3', 'b74a37105022bd', 'c0139137');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE turno 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
