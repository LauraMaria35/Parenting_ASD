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
session_start();

$_srv = $_SERVER[ 'PHP_SELF' ];

if ( !isset( $_POST[ 'submit' ] ) ) {
    if ( !isset( $_GET[ 'alpha' ] ) ) {
        header( 'Location:A_management_home.php' );

        exit();
    }
    $_inhoud = "
    <div align='center'>
       <br><br>
       <h1>Initial password creation</h1>
       <form  method=post action='$_srv'>
          <table width=400 height=150  cellspacing= 5 >
            <tr valign=middle>
              <td height=30><h3>Logon (salt)</h3></td>
              <td><input type=text name = 'salt'/></td>
            </tr>
            <tr valign=middle>
            <td width=100 height=30><h3>Password</h3></td>
            <td width=185 align=left><input type=text name='string' /></td>
          </tr>
            <tr valign=middle>
              <td height=30 colspan = 2 align=center ><input type = submit  name = 'submit'  value=Encrypt /> &nbsp; <a href=A_management_home.php><button>A&amp;A management home</button></a></td>
            </tr>
          </table> 
      </form> 
    </div>";
} else {

    $_encrypt = '../'.$_SESSION[ 'encrypt' ];

    require_once( $_encrypt );
    $_string = $_POST[ 'string' ];
    $_salt = $_POST[ 'salt' ];
    $_salt = ( isset( $_POST[ 'salt' ] ) )? $_POST[ 'salt' ] : '';

    $_encrypted = encrypt( $_string, $_salt );
    $_volgende = "$_srv?alpha=1";

    $_inhoud = "<div align='center'>
	<br><br><br>
  <h1>Initial password creation</h1>
	<h3>Encriptie resultaat voor </h3><br>
	<p>string &rarr; &quot;$_string&quot; </p>
	<p>salt &rarr; &quot; $_salt&quot; </p>
	<p>encrypted password<br><br>&darr;<br><br><strong>$_encrypted</strong></p>
	<br><br><br> 
	<a href=$_volgende><button>volgend</button></a> &nbsp; <a href=A_management_home.php><button>A&amp;A management home</button></a>
</div>";
}

echo $_inhoud;
?>
