<?php

session_start();
/******************
*Initialisatie
*******************/
try {
	//$_srv gebruiken we als "action" in onze formulieren
	$_srv = $_SERVER['PHP_SELF'];


	// includes  

	// instantiering van $_PDO (connectie met dbms en selectie van de db)
	require_once("../connections/pdo.inc.php");
	// functie om strings te encrypten
	require_once("../php_lib/encrypt.inc.php");

	// functie e-mail te simuleren indien smtp niet beschikbaar
	require("../php_lib/sendMail.inc.php");

	
	if (!isset($_POST['submit']))
	{

		// verstuur formulier om e-mail in te geven  

		$_inhoud = "<h2>Enter your email</h2>
                <form action='$_srv' method='post'>
                  <label>E-mail</label>
                    <input type='mail'  name= 'mail'
                      placeholder= 'e-mail' >
					  <br>
					  <input type="submit" class="btn btn-secondary btn-block">Send
                </form>
                <br><br><br>";   
	}

	else
	{
		// verwerk formulier  
		$_mail = addslashes($_POST['mail']);

		// kij na of e-mail in de db staat  
		$_sql = $_PDO->prepare(
			"SELECT d_user FROM ts_authentication WHERE 
      d_logon = :mail"); 

		$_sql -> execute(
			array('mail' => $_mail));

		if ($_sql -> rowCount()>0) 
		{
			while($_row = $_sql -> fetch(PDO::FETCH_ASSOC)) 
			{	
				$_user = $_row['d_user']; 
			}

			//  e-mail & database
			$_nu =time();
			$_resetKey = encrypt("$_mail $_user $_nu", "webo");
			$_resetTime = $_nu + (60*60*1); // 1 uur

			// zet resetkey en resettimer in db 
			

			$_query= "UPDATE ts_authentication
          SET d_resetKey = '$_resetKey' ,
              d_resetTimer = '$_resetTime'
          WHERE d_user = $_user"; 
			
			$_result = $_PDO -> query("$_query"); 
			// email content   
			$_content = "For password reset <a href =http://$_domain/scripts/P_reset.php?k=$_resetKey> klik here </a>";
			
			sendMail($_mail,"Password Reset",$_content);
			
			// boodschap naar de gebruiker   
			$_inhoud = "<br><br><br>
                <h2>You received an email with further instructions</h2>
                <br><br><br>";   
		}
		else    
		{
			$_inhoud = "<br><br><br>
                <h2>Unknown e-mail</h2>
                <br><br><br>
								<a href=$_srv>Try again</a>"; 
		}
	}
/*******************************************
*    output
********************************************/  
	//$_smarty instantieren en initialiseren  
	require_once("../smarty/mySmarty.inc.php");
	
	$_smarty->assign('inhoud',$_inhoud);
	// display it
	$_smarty->display('reset.tpl');
	

}

catch (Exception $_e)
{
	// exception handling funtions 
	include("../php_lib/myExceptionHandling.inc.php"); 
	echo myExceptionHandling($_e,"../logs/error_log.csv");
}

?>