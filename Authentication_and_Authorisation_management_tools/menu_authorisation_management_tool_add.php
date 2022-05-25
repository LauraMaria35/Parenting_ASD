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
	$_inhoud="<h1>Menu-item toevoegen </h1>	
  <form method=POST action=$_srv>
  <label>Menu &nbsp;&nbsp;&nbsp;&nbsp; :</label>
  <input type=text name =menu>	<br><br>
  <label>Item &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
  <input type=text name =item>	<br><br>
  <label>Link &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
  <input type=text name =link value='../scripts/'> <br><br>
  <label>Volgorde :</label>
  <input type=text name =volgorde>	<br><br>
	<input type=submit name=submit value=toevoegen> &nbsp; <a href=A_management_home.php><button>A&amp;A management home</button></a>
	</form>";
  	
	
	echo $_inhoud;

	}
	else
	{
		$_menu = trim($_POST['menu']);
    $_item = trim($_POST['item']);
    $_link = trim($_POST['link']);
    $_volgorde = trim($_POST['volgorde']);

    $_query = "INSERT INTO t_menu (d_menu, d_item, d_link, d_volgorde) VALUES ('$_menu', '$_item', '$_link', '$_volgorde');"; 

    $_result = $_PDO -> query("$_query");

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