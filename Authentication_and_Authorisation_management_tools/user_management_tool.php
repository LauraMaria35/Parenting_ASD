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
	require("code/initialisatie_alpha.inc.php");

	
	$_content="";
	$_authorized=array();
	$_cntr=0;
/*******************************************
*    (Input en) verwerking
********************************************/
	if (! isset($_POST['submit']))
	{
				$_query="SELECT * FROM ts_authentication;";

				$_result = $_PDO -> query("$_query"); 

				if ($_result -> rowCount() == 0)
				{
          throw new Exception("db-inconcsistency");
          
        }
        $_inhoud="<h1>User management &nbsp;&nbsp;&nbsp;</h1>
        <a href='usern_management_tool_add.php'><button>&quot;User&quot; toevoegen</button></a> &nbsp; <a href=A_management_home.php><button>A&amp;A management home</button></a><br><br>";
       
        $_inhoud.="<table>
                  <tr>
                  <td>user</td>
									<td>rol</td>
                  <td>logon<br>
                  <td>paswoord (hashed)</td>
                  <td>identifier <br>token<br>expire</td>
                  <td>faultCntr<br>timeOut</td>
                  <td>resetKey<br>resetTimer</td>
                  ></tr>";
					while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
					{
				$_inhoud.="\n
				<form method='POST' action='user_management_tool_update.php'>
				<tr>
        \n<td> <input type='text' name='user' value='".$_row['d_user']." readonly'>
        \n<td> <input type='text' name='rol' size='5' value='".$_row['d_rol']."'></td>
        \n<td> <input type='text' name='logon' size='20' value='".$_row['d_logon']."'> 
				\n<br> <input type='text' name='paswoord' size='20' value='".$_row['d_paswoord']."'></td>
        \n<td> <input type='text' name='identifier' size='30' value='".$_row['d_link']."'> 
				\n<br> <input type='text' name='token' size='30' value='".$_row['d_token
				']."'> 
				\n<br> <input type='text' name='expire' size='30' value='".$_row['d_expire']."'></td>
        \n<td> <input type='text' name='volgorde' size='5' value='".$_row['d_volgorde']."'></td>";
				for($_z=0; $_z <=8; $_z++)
				{
					$_inhoud.="\n<td>&nbsp;&nbsp;&nbsp; <input type='checkbox' name='d$_z'";
					if ($_row["d_$_z"]==1)
					{
						$_inhoud.=" checked></td>";
					}
					else
					{
						$_inhoud.="></td>";

					}
					$_inhoud.="\n";
				}
				$_inhoud.="	\n<td><input type='submit' name='submit' value='aanpassen'></form></td>
				\n\n<form method='POST' action='menu_authorisation_management_tool_delete.php'>
				\n<input type='hidden' name='index' value='".$_row['d_index']."'>
				\n<td><input type='submit' name='submit' value='Verwijder'></form></td>
				</tr>";	
				$_cntr++;
		
		}


	}
	else
	{
		/*
		$_query= "DELETE FROM ts_authorisation";
		$_PDO->query($_query);
		
		
		$_query="INSERT INTO ts_authorisation (d_index,d_script,d_0,d_1,d_2,d_3,d_4,d_5,d_6,d_7,d_8) VALUES ";
		
		$_first=true;

		foreach($_POST['script'] as $_key => $_script) 
		{
			if (! $_first)
			{
				$_query.= ", ";
			}
			else
			{
				$_first=false;
			}

			$_query.= "($_key,'$_script'";

			for($_x=0;$_x<=8;$_x++)
			{
				if (isset($_POST["bo-$_key-x-$_x"]))
				{
					$_value= ",'1'";
				}
				else
				{
					$_value= ",'0'";
				}
				$_query.=$_value;
			}

			$_query.=")";

		}
		$_query.=";";
		
		$_PDO->query($_query);
		$_inhoud="<a href=$_srv><input type=button value='Opnieuw / Toon'></a>";
		*/
	}
	
	
	echo $_inhoud;

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