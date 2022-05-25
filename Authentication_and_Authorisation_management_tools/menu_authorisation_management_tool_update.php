<?php
/*

The MIT License (MIT)

Copyright (c) Mon March 28 2022 Micky De Pauw Micky.depauw@webontwikkeling.info

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

/**
* Dit script laat toe om de auhorisation voor alle scripts op een 
* gebruiksvriendelijke manier aan te passen. 
* Plaats het in de root folder.
*
******************** LET OP ********************
******************** LET OP ********************
******************** LET OP ********************
******************** LET OP ********************
* DIT SCRIPT IS NIET BEVEILIGD EN MAG DUS NOOIT OP EEN PUBLIEKE SERVER GECOPIEERD WORDEN,OOK NIET SAMEN MET ANDERE CODE
**/


try
{
	require("code/initialisatie_beta.inc.php");

	$_cntr=0;

/*******************************************
*    (Input en) verwerking
********************************************/
	if (! isset($_POST['submit']))
	{
    throw new Exception("illegal access");
	}
	else
	{
		$_index = $_POST['index'];
    $_menu = trim($_POST['menu']);
    $_item = trim($_POST['item']);
    $_link = trim($_POST['link']);
    $_volgorde = trim($_POST['volgorde']);
  
   
    for($_z=0; $_z <=8; $_z++)
		{
      
      $_dz[$_z] = (isset($_POST["d$_z"]))? 1: 0;

    
    }
  
    $_query= "UPDATE t_menu
								SET d_menu = '$_menu',
										d_item = '$_item',
										d_link = '$_link',
										d_volgorde = '$_volgorde'";
		for($_z=0; $_z <=8; $_z++)
		{
      $_query.=",d_$_z = '".$_dz[$_z]."' ";
    }	

$_query.="WHERE d_index = $_index ;";	


    // Query naar DB sturen
    $_result = $_PDO -> query($_query); 
    header('Location: menu_authorisation_management_tool.php');
	}


}

catch (Exception $_e)
{
	echo ("<hr>
    <strong>Exception</strong><br><br>
    Foutmelding: ".$_e->getMessage()."<br><br>
    Bestand: ".$_e->getFile()."<br>
    Regel: ".$_e->getLine()."<br><hr>");
}



?>