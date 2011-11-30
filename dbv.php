<?php
include('./View.php');
$mysqli = new mysqli('localhost','root','1234');
$result = $mysqli -> query("SHOW DATABASES");
while($row = $result -> fetch_assoc() ) {
	$rows[] = $row;
}

$view = new View();
$view -> databases = $rows;
$view -> template = './views/dbs.phtml';
echo $view -> render('./views/layout.phtml');