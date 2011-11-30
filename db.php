<?php
include('./View.php');
$db = $_GET['db'];
$mysqli = new mysqli('localhost','root','1234',$db);
$result = $mysqli -> query("SHOW TABLES");
while($row = $result -> fetch_assoc() ) {
	$rows[] = $row;
}

$view = new View();
$view -> tables = $rows;
$view -> db = $db;
$view -> template = './views/db.phtml';
echo $view -> render('./views/layout.phtml');