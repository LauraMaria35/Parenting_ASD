<?php
try
{

	if ( isset($_GET['b']))
	{

		ini_set("SMTP","send.one.com");
		ini_set ("sendmail_from","internet@oefening.be");

		$_onderwerp "Contactformulier vanop website"
		$_bericht = $_GET['b']
		$_to = 'contact@lauraciocalau.com';

		mail($_to, $_onderwerp, $_bericht);

	}
	else
	{
		throw new Exception("illegal access");
	}
}

catch (Exception $_e)
{
	// exception handling funtions 
	include("../php_lib/myExceptionHandling.inc.php"); 
	echo myExceptionHandling($_e,"../logs/error_log.csv");
}


?>
