<?php
error_reporting(13);

if ($_SERVER['SERVER_NAME'] != "localhost")
{
	// database
	$_hostname = "";
	$_username = "";
	$_password = "";
	$_database = "";
	
	// andere project afhangkelijke waarden
	//$_domain = "";
}
else
{
	// database
	$_hostname = "localhost";
	$_username = "root";
	$_password = "";
	$_database = "db_parentingASD";
	
	// andere project afhangkelijke waarden
	//$_domain = "webo:8888/C_Applicaties/APP_13_final";
}
$_PDO = new PDO("mysql:host=$_hostname; dbname=$_database","$_username", "$_password");

$_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>