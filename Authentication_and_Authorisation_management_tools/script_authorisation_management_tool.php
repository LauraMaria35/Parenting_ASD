<?php
/*

The MIT License ( MIT )

Copyright ( c ) Mon May 11 2020 Micky De Pauw Micky.depauw@webontwikkeling.info

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files ( the 'Software' ), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
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
* Werkt enkel  wanneer de scriptsinéénfolder ( scripts ) staan
*
******************** LET OP ********************
******************** LET OP ********************
******************** LET OP ********************
******************** LET OP ********************
* DIT SCRIPT IS NIET BEVEILIGD EN MAG DUS NOOIT OP EEN PUBLIEKE SERVER GECOPIEERD WORDEN, OOK NIET SAMEN MET ANDERE CODE
**/

try {
    require( 'code/initialisatie_alpha.inc.php' );
    $_content = '';
    $_authorized = array();
    $_cntr = 0;
    /*******************************************
    *    ( Input en ) verwerking
    ********************************************/
    if ( ! isset( $_POST[ 'submit' ] ) )
    {
        $_folders = $_SESSION[ 'scripts' ];

        foreach ( $_folders as $_actual )
        {
					  $_lijst=array();
            $_toOpen = "../$_actual";
            $_dir = opendir( $_toOpen );
            // open de 'content' folder

            if ( $_dir == FALSE ) // indien openen niet gelukt is ...
            {
                throw new Exception( "Folder &quot;$_actual$quot; niet geopend" );
            }

            while ( ( $_file = readdir( $_dir ) ) !== false ) // lees alle files in folder
            {
                $_lijst[] = $_file;
                // plaats de file-naam in de array $_lijst
            }

            closedir( $_dir );
            // sluit de folder

            sort( $_lijst );
            // sorteer de array

            foreach ( $_lijst as $_file )  // ga alle files uit de lijst af
            {
                $_lengte = strlen( $_file );
                //bepaal de lengte van de file-naam
                $_extensie = substr( $_file, ( $_lengte - 3 ), 3 );
                // php

                if ( $_extensie == 'php' ) // info files
                {

                    $_query = "SELECT * FROM ts_authorisation WHERE d_script = '$_file';";

                    $_result = $_PDO -> query( "$_query" );

                    if ( $_result -> rowCount() > 0 )
                    {
                        while ( $_row = $_result -> fetch( PDO::FETCH_ASSOC ) )
                        {
                            for ( $_x = 0; $_x <= 8; $_x++ )
                            {
                                $_authorized[ $_x ] = $_row[ "d_$_x" ];
                            }
                        }
                    } else {
                        for ( $_y = 0; $_y <= 8; $_y++ )
                        {
                            if ( $_y == 1 )
                            {
                                $_authorized[ $_y ] = 1;
                            } else {
                                $_authorized[ $_y ] = 0;
                            }
                        }
                    }

                    $_content .= "\n<tr><td>&nbsp;$_actual/&nbsp;<input type=text size=30 name=script[] value=$_file readonly</td>";

                    for ( $_z = 0; $_z <= 8; $_z++ )
                    {

                        $_content .= "<td>&nbsp;&nbsp;&nbsp;&nbsp; <input type=checkbox name='bo-$_cntr-x-$_z' value=1";

                        if ( $_authorized[ $_z ] == 1 )
                        {
                            $_content .= ' checked></td>';
                        } else {
                            $_content .= '></td>';

                        }
                    }
                    $_content .= '</tr>';

                    $_cntr++;
                }
            }
        }

				if (isset($_SESSION['aangepast']))
				{
					$_msg=" &nbsp; &rarr; De gevraagde aanpassingen werden uitgevoerd<br>";

					unset($_SESSION['aangepast']);
				}
				else
				{
					$_msg="";
				}
        $_inhoud = "<h1>Script-authorisation</h1>";
			
				$_inhoud.= "<a href=A_management_home.php><button>A&amp;A management home</button></a>
				<form method=POST action='$_srv'>
	<br><br>
	<input type=submit name=submit value='aanpassen'/>$_msg<br><br>
	<table style='width:800px' border=1> 
	  <tr>
      <th>script</th>";

        for ( $_w = 0; $_w <= 8; $_w++ )
        {
            $_inhoud .= "<th>$_w</th>";
        }
        $_inhoud .= "</tr>$_content</table><br><br>
	<input type=submit name=submit value=aanpassen> &nbsp; <a href=A_management_home.php><button>A&amp;A management home</button></a>
	</form>";
    } else {
        $_query = 'DELETE FROM ts_authorisation';
        $_PDO->query( $_query );

        $_query = 'INSERT INTO ts_authorisation (d_index,d_script,d_0,d_1,d_2,d_3,d_4,d_5,d_6,d_7,d_8) VALUES ';

        $_first = true;

        foreach ( $_POST[ 'script' ] as $_key => $_script )
        {
            if ( ! $_first )
            {
                $_query .= ', ';
            } else {
                $_first = false;
            }

            $_query .= "($_key,'$_script'";

            for ( $_x = 0; $_x <= 8; $_x++ )
            {
                if ( isset( $_POST[ "bo-$_key-x-$_x" ] ) )
                {
                    $_value = ",'1'";
                } else {
                    $_value = ",'0'";
                }
                $_query .= $_value;
            }

            $_query .= ')';

        }
        $_query .= ';';

        $_PDO->query( $_query );
				$_SESSION["aangepast"]=true;
        header("Location:$_srv"); 
	     	exit();
    }

    echo $_inhoud;

} catch ( Exception $_e ) {
    echo ( "<hr>
    <strong>Exception</strong><br><br>
    Foutmelding: ".$_e->getMessage()."<br><br>
    Bestand: ".$_e->getFile()."<br>
    Regel: ".$_e->getLine().'<br><hr>' );
}

?>