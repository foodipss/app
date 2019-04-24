<?php

//insert.php

$connect = new PDO('mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af588fa1a66d1f3', 'b74a37105022bd', 'c0139137');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO turno 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
