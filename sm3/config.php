<?php 

	//MEGADJUK A BELÉPÉSI ADATOKAT
	$conn = new mysqli("localhost", "root", "", "sm3");
	
	//MEGNÉZZÜK, HOGY LEHET-E KAPCSOLÓDNI
	if($conn->connect_error){
		die("Connection failed! ".$conn->connect_error);
	}

?>