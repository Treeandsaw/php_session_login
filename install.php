<?php

	$connection = mysql_connect("localhost", "root", "");   

	$db = new mysqli('localhost', 'root', '');  

	// Create Database
	$sql = 'CREATE DATABASE geolocation';
	$db->query($sql); 

	$db = new mysqli('localhost', 'root', '', 'geolocation');  


	// Create Table
	$sql = "CREATE TABLE login(
			id int(10) NOT NULL AUTO_INCREMENT,
			username varchar(255) NOT NULL,
			password varchar(255) NOT NULL,
			PRIMARY KEY (id)
			)";
	$db->query($sql);  

	$sql = "INSERT INTO `login` (`id`, `username`, `password`) VALUES (1, 'hi', 'hi')";
	$db->query($sql); 

	$sql = "SELECT * FROM login WHERE id = 1";
	$result = $db->query($sql);   
	$row = $result->fetch_assoc();  

	echo '<h3 style="padding: 100px; text-align: center;">';


 	if ($row['id']==1) {
 		echo 'Successful to Create Database & Table.';
 	} else {
 		echo 'Something is wrong. Check out database and password.'; 
 	}

	echo '</h3>'; 
  
    mysql_close($connection); // Closing Connection 
?>