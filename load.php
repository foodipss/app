<?php

//load.php

$connect = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');

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