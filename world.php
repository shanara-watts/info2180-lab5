<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

try 
{
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} 
catch(Exception $ex) 
{
  die($ex->getMessage());
}

header('Content-Type: application/json');
//echo json_encode($superheroes);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$coun = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $coun->fetchAll(PDO::FETCH_ASSOC);

/*
$country = strval($_GET["country"]);
$context = strval($_GET["context"]);

$query = filter_var(htmlentities($query), FILTER_SANITIZE_STRING);
$query = html_entity_decode($query,ENT_QUOTES); //I converted it to html to preserve the quotes that are in some names
*/

//$stmt->bindValue(1,$query);
//$stmt->execute(); 


if ($context == "cities")
{
  $stmt = $conn->query("SELECT c.name, c.district, c.population 
  FROM cities c JOIN countries cs on c.country_code = cs.code 
  WHERE cs.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  require 'city.php';
}
else
{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  require 'country.php';
}
?>
