<?php
try{
	$dsn = 'mysql:host=localhost;dbname=php1714;charset=utf8';
	$pdo = new PDO($dsn, 'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('数据库链接失败'.$e->getMessage());
}


try{
	$uid = $_GET['id'];

	$result = $pdo->exec("delete from tab where uid=$uid");
	
}catch(PDOException $e){
	echo $e->getCode();
	echo $e->getMessage();
}