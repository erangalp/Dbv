<?php
if(isset($_GET['tables']) && !empty($_GET['tables'])) {
	include('./View.php');
	$tables = $_GET['tables'];
	$db = $_GET['db'];
	$mysqli = new mysqli('localhost','root','1234',$db);
	$tableDesc = array();
	$view = new View();
	foreach($tables as $table) {
		$rows = array();
		$result = $mysqli -> query("DESCRIBE " . $table);
		while($row = $result -> fetch_assoc() ) {
			$rows[] = $row;
		}
		$view -> table = $rows;
		$tableDesc[$table] =  $view -> render('./views/table.phtml');
	}
	echo json_encode($tableDesc);
}