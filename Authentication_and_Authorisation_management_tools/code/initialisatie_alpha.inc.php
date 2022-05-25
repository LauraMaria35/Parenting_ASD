<?php
	session_start();

	if(!isset($_SESSION[ 'ok' ]))
	{
		header("Location:A_management_home.php"); 
		exit();
	}
	$_databaseConnection = "../".$_SESSION[ 'database' ];

	require($_databaseConnection);
	$_srv = $_SERVER['PHP_SELF'];
	$_inhoud="";
?>