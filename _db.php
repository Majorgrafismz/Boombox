<?php

$h = 'localhost';
$db   = '_assignment';
$username = 'root';
$password = '';
$charset = 'utf8';

$dsn = "mysql:host=$h;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $_DB = new PDO($dsn, $username, $password, $options);
  //echo "*";
} catch (PDOException $e) {
  print "DAAAAAMN Error!: " . $e->getMessage() . "<br/>";
  die();
}

/*try {
  $request = "UPDATE blank SET content = :content WHERE id = :id";
  $_DB->prepare($request)->execute(array("content" => "je suis VRAIMENT COSMIQUE !", "id" => 4));

} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

try {
  $request = "INSERT INTO blank SET content = :content";
  $_DB->prepare($request)->execute(array("content" => "Tant !! Que L'Univers en est VERT !"));

} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

try {
  $request = $_DB->prepare('SELECT * FROM blank');
  $request->execute();
  $results = $request->fetchAll();
  var_dump($results);
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}*/

 ?>
