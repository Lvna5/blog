<?php
try{
	$dsn = 'mysql:host=localhost;dbname=php1714;charset=utf8';
	$pdo = new PDO($dsn, 'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('数据库链接失败'.$e->getMessage());
}


try{
	//增的语句
	$name = $_GET['name'];
	$password = $_GET['password'];
	$result = $pdo->exec("insert into tab(name,password)values('$name','$password')");
	if($result) {
		echo json_encode(['state'=> 1]);
	} else {
		echo json_encode(['state'=> 0]);
	}
	
}catch(PDOException $e){
	echo $e->getCode();
	echo $e->getMessage();
}