<?php
	/*Cách 1*/
	/*$db= new PDO("mysql:host=localhost;dbname=name", 'root', '');
	$db->query('set names "utf8"');	
	$var1 = 1;
	$var2 = 2;
	$sql = "SELECT * FROM theloai LIMIT ?,?";
	$cursor = $db->prepare($sql);

	$cursor->bindParam(1,$var1);
	$cursor->bindParam(2,$var2);
	$cursor->execute();
	echo "<br>";
	print_r($cursor->fetchAll());
	echo "<br>";*/
	/* Cách 2*/
	/*$db= new PDO("mysql:host=localhost;dbname=name", 'root', '');
	$db->query('set names "utf8"');	
	$var1 = 1;
	$var2 = 2;
	$sql = "SELECT * FROM theloai LIMIT $var1,$var2";
	$cursor = $db->prepare($sql);
	$cursor->execute();


	echo "<br>";
	print_r($cursor->fetchAll());
	echo "<br>";*/


$sinhvien = array();
$sinhvien[] = 'Nguyễn văn A';
$sinhvien[] = 'Nguyễn Văn B';
print_r($sinhvien);

