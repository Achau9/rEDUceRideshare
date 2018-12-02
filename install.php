<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'rideshare';

try {
	//create database
	$dbconn = new PDO("mysql:host=$server", $user, $pass);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$dbconn->exec('CREATE DATABASE IF NOT EXISTS `rideshare` COLLATE \'utf8_unicode_ci\';');
}
catch (PDOException $err) {
	die("DB ERROR: ". $err->getMessage());
}
try{
	//create tables
	$dbconn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="CREATE TABLE IF NOT EXISTS `riders` (
				id INT(11) AUTO_INCREMENT,
				username VARCHAR(15) NOT NULL,
				state VARCHAR(15) NOT NULL,
				city VARCHAR(15) NOT NULL,
				date DATE NOT NULL,
				PRIMARY KEY (id)
			);";
			$dbconn->exec($sql);
}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}