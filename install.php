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
  
  // drop all tables
  $sql = "DROP TABLES IF EXISTS users, riders";
  $dbconn->exec($sql);

	// Create USERS table
	$sql="CREATE TABLE IF NOT EXISTS `users` (
		id int(11) NOT NULL AUTO_INCREMENT,
		  username VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  email VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  password VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (id)
    );
    CREATE INDEX  `username_idx` ON users(username)";
	$dbconn->exec($sql);

	// Create RIDERS table
	// $sql="CREATE TABLE IF NOT EXISTS `riders` (
	// 			rideid INT(11) AUTO_INCREMENT,
	// 			username VARCHAR(100) CHARACTER SET utf8 NOT NULL,
	// 			state VARCHAR(15) NOT NULL,
	// 			city VARCHAR(15) NOT NULL,
	// 			date DATE NOT NULL,
	// 			PRIMARY KEY (rideid),
	// 			CONSTRAINT `fk_username` 
	// 			FOREIGN KEY (username) REFERENCES users (username)
	// 		);";
	$sql=" CREATE TABLE `riders` (
  `id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

			$dbconn->exec($sql);
	$sql="INSERT INTO `riders` VALUES
	(NULL, 'bob', 'Troy', 'NY', '0000-00-00'),
	(NULL, 'bob', 'Troy', 'NY', '0000-00-00'),
	(NULL, 'bob', 'Troy', 'NY', '0000-00-00'),
	(NULL, 'bob', 'Troy', 'NY', '0000-00-00'),
	(NULL, 'bob', 'Troy', 'NY', '1998-02-01'),
	(NULL, 'bob', 'Troy', 'NY', '1998-01-01'),
	(NULL, 'bob', 'Troy', 'NY', '0000-00-00'),
	(NULL, 'bob', 'Troy', 'NY', '2018-12-19'),
	(NULL, 'bob', 'Jfsd', 'fa', '2018-12-07'),
	(NULL, 'bob', 'hhsg', 'nu', '2018-12-06'),
	(NULL, 'bob', 'hhsg', 'nu', '2018-12-06');";
			$dbconn->exec($sql);

}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}
?>