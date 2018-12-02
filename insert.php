<?php
	session_start();
	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'rideshare';

	try {
		//create database
		$city=$_POST['city'];
		$state=$_POST['state'];
		$date=$_POST['date'];
		$dbconn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$ins=$dbconn->prepare(
			'INSERT INTO `riders` (username,state,city,date)
			VALUES (:username,:city,:state,:date)'
		);
		$username=$_SESSION['username'];
		$dt=new DateTime($date);
		$date=$dt->format('Y-m-d');
		$ins->bindParam(':username',$username);
		$ins->bindParam(':city',$city);
		$ins->bindParam(':state',$state);
		$ins->bindParam(':date',$date);
		
		$ins->execute();
		echo "New records created successfully";
	}
	catch(PDOException $e){
		echo "<br>" . $e->getMessage();
	}
?>