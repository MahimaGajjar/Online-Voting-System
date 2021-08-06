<?php 
require_once '../includes/init.php';
function loadcollege(){
	$db = new data;
	$com = $db->connect();

	$stmt =  $con->prepare("SELECT * FROM college");
	$stmt->execute();
	$colleges = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $colleges;
}


?>