<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=php1714;charset=utf8', 'root', '');
	// $name = $_POST['name'];
	$stmt = $pdo->prepare('select * from tab');
	$stmt->execute();

	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	
	if($data) {
		echo json_encode($data);
	} else {
		echo json_encode($data);
	}
} catch (PDOException $e) {

}