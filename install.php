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
  $sql = "DROP TABLES IF EXISTS comments, drivers, riders, users";
  $dbconn->exec($sql);

	// Create USERS table
	$sql="CREATE TABLE IF NOT EXISTS `users` (
		id int(11) NOT NULL AUTO_INCREMENT,
		  username VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  email VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  city VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  state VARCHAR(2) CHARACTER SET utf8 NOT NULL,
		  password VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (id)
    );
    CREATE INDEX  `username_idx` ON users(username)";
	$dbconn->exec($sql);

	// Create RIDERS table
	$sql="CREATE TABLE IF NOT EXISTS `riders` (
				rideid INT(11) AUTO_INCREMENT,
				username VARCHAR(100) CHARACTER SET utf8 NOT NULL,
				state VARCHAR(2) CHARACTER SET utf8 NOT NULL,
				city VARCHAR(100) CHARACTER SET utf8 NOT NULL,
				date DATE NOT NULL,
				accepted BOOLEAN,
				PRIMARY KEY (rideid),
				CONSTRAINT `fk_rid_username`
				FOREIGN KEY (username) REFERENCES users (username)
			);";
	$dbconn->exec($sql);
    
    
    $sql="CREATE TABLE IF NOT EXISTS `drivers` (
		rideid INT(11) AUTO_INCREMENT,
		username VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		state VARCHAR(2) NOT NULL,
		city VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		date DATE NOT NULL,
		PRIMARY KEY (rideid),
		CONSTRAINT `fk_drv_username`
		FOREIGN KEY (username) REFERENCES users (username)
		);";
	$dbconn->exec($sql);

	$sql="CREATE TABLE IF NOT EXISTS `comments` (
		CommentID INT(11) AUTO_INCREMENT,
		ReviewedUser VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		ReviewPoster VARCHAR(100) CHARACTER SET utf8 NOT NULL,
		StarRating INT(1),
        TextReview VARCHAR(2000) CHARACTER SET utf8 NOT NULL,
        PRIMARY KEY (CommentID)
        );";
	$dbconn->exec($sql);


	$sql ="INSERT INTO `users` VALUES
	(999999, '_', '_@_.com', 'passhash', 'Troy', 'NY');";
	$dbconn->exec($sql);

	$sql="INSERT INTO `riders` VALUES
	(NULL, '_', 'NY', 'Troy', '2006-01-03',FALSE),
	(NULL, '_', 'NY', 'Troy', '2006-03-02',FALSE),
	(NULL, '_', 'NY', 'Troy', '2009-05-06',FALSE),
	(NULL, '_', 'NY', 'Troy', '2009-01-19',FALSE),
	(NULL, '_', 'NY', 'Troy', '2012-02-01',FALSE),
	(NULL, '_', 'NY', 'Troy', '2013-03-02',FALSE),
	(NULL, '_', 'NY', 'Troy', '2013-03-04',FALSE),
	(NULL, '_', 'NJ', 'Tims', '2016-12-19',FALSE),
	(NULL, '_', 'NJ', 'Tims', '2017-12-07',FALSE),
	(NULL, '_', 'NJ', 'Tims', '2018-02-02',FALSE),
	(NULL, '_', 'NJ', 'Tims', '2018-12-06',FALSE);";

	$dbconn->exec($sql);

}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}
?>