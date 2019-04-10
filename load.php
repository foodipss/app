<?php

//load.php

$connect = new PDO('mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_af588fa1a66d1f3', 'b74a37105022bd', 'c0139137');

$data = array();

$query = "SELECT * FROM turno ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
