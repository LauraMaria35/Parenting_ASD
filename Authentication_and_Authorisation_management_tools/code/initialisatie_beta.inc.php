<?php
	session_start();

	$_databaseConnection = "../".$_SESSION[ 'database' ];

	require($_databaseConnection);
	$_srv = $_SERVER['PHP_SELF'];
	$_inhoud="";
?>