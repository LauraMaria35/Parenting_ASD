<?php
try
{
	require_once("../code/initialisatie.inc.php");

	If (!isset($_POST['submit']))
	{
		$_inhoud= "<div id='logoff'>
               <form  method='post' action='$_srv'>
                <label>Forget about me</label>
                <input type='checkbox' name='persist' />
                <br><br>
                <input type='submit' name='submit' value='Tot ziens'/>
                </form>
               </div>";
	}
	else
	{
		if (isset ($_POST['persist'])) // persistente  log-out 
		{
			// alle persistentie velden op hun default waarde       
			$_user_id = $_SESSION['user_id'];
			$_query = "UPDATE  ts_authentication 
                        SET 
                        d_token = ' ',
                        d_identifier = ' ',
                        d_expire= 0
                     WHERE d_user ='".$_SESSION['user_id']."'";
			$_PDO->query($_query);
			$_action=" Persistently logged out";
		}
		else
		{
			$_action=" Logged out";
		}
		
		require_once('../php_lib/logSecurityInfo.inc.php');

		logSecurityInfo($_SESSION['logon'], $_action);
	
		session_destroy(); // vernietig de sessie
		header('Location:../goodBye/goodBye.html'); // keer terug naar de logon-pagina
		exit;
	}

	$_commentaar = "Z_loggedOut_C.html";
	$_menu = 0;

	require("../code/output.inc.php");
}

catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}



?>