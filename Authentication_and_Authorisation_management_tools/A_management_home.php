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
    session_start();
    $_srv = $_SERVER[ 'PHP_SELF' ];
    $_inhoud = '';
    $_database="";
    $_encrypt="";

    //parameters aanpassen

    // database

    if ( isset( $_POST[ 'submitDB' ] ) ) {

        $_content[ 0 ] = $_POST[ 'database' ];
        $_pointer = fopen( 'parameters/database.csv', 'w+b' );
        if ( ! $_pointer ) {
          throw new Exception( 'Error opening database.csv' );
      }

            fputcsv( $_pointer, $_content );

            fclose( $_pointer );

            echo(" &nbsp; &nbsp; &nbsp; &nbsp; Database connection aangepast naar &quot;".$_POST[ 'database' ]."&quot; &nbsp; <a href=$_srv><button>Ga verder</button> </a>");
            exit();

    }

    // encrypt

    if ( isset( $_POST[ 'submitENC' ] ) ) {

      $_content[ 0 ] = $_POST[ 'encrypt' ];
      $_pointer = fopen( 'parameters/encrypt.csv', 'w+b' );
      if ( ! $_pointer ) {
        throw new Exception( 'Error opening encrypt.csv' );
    }

          fputcsv( $_pointer, $_content );

          fclose( $_pointer );

          echo(" &nbsp; &nbsp; &nbsp; &nbsp; Encryption function aangepast naar &quot;".$_POST[ 'encrypt' ]."&quot; &nbsp; <a href=$_srv><button>Ga verder</button> </a>");
          exit();

  }


  // script folders

  if ( isset( $_POST[ 'submitSCRIPT' ] ) ) {

    $_content = explode(',',$_POST[ 'scripts' ]);
    $_pointer = fopen( 'parameters/scripts.csv', 'w+b' );
    if ( ! $_pointer ) {
      throw new Exception( 'Error opening scripts.csv' );
  }

        fputcsv( $_pointer, $_content );

        fclose( $_pointer );

        echo(" &nbsp; &nbsp; &nbsp; &nbsp; Encryption function  aangepast naar &quot;".$_POST[ 'scripts' ]."&quot; &nbsp; <a href=$_srv><button>Ga verder</button> </a>");
        exit();

}


    $_inhoud = ' &nbsp; &nbsp; &nbsp;<h1><strong>A</strong>uthentication &amp; <strong>A</strong>uthorisation management tools</h1>';

    $_inhoud .= " &nbsp; &nbsp; &nbsp;
  <a href=menu_authorisation_management_tool.php?alpha=1><button>Menu Authorisation</button></a> &nbsp; 
  <a href=script_authorisation_management_tool.php?alpha=1><button>Script Authorisation</button></a>  &nbsp; 
  <a href=user_management_tool.php><button>User managment</button></a> &nbsp; 
  <a href=initial_password_tool.php?alpha=1><button>Initial Password creation</button></a> ";
    $_inhoud .= '<br><hr><hr><br>';

    $_inhoud .= "<h2> &nbsp; &nbsp; &nbsp; Initialisatie</h2>";

    //database

    $_pointer = fopen( 'parameters/database.csv', 'rb' );
    if ( ! $_pointer ) {
        throw new Exception( 'Error opening database.csv' );
    }

    while( ! feof( $_pointer ) ) {
        $_record = ( fgetcsv( $_pointer ) );
        list( $_var ) = $_record;

        if ( $_var != '' ) {
            $_database = $_var;
        }
    }

    fclose( $_pointer );

    $_inhoud .= "<form  method='post' action='$_srv'>
  <label> &nbsp; &nbsp; &nbsp; &nbsp; Database connection (relatief tegenover de root folder)</label>
  <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
    <input type='text' name='database' size='100' value=$_database>
    <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
    <input  type=submit name=submitDB value='Pas aan'></form><hr>";

    $_SESSION[ 'database' ] = $_database;

    //Encryption function

    $_pointer = fopen( 'parameters/encrypt.csv', 'rb' );
    if ( ! $_pointer ) {
        throw new Exception( 'Error opening encrypt.csv' );
    }

    while( ! feof( $_pointer ) ) {
        $_record = ( fgetcsv( $_pointer ) );
        list( $_var ) = $_record;

        if ( $_var != '' ) {
            $_encrypt = $_var;
        }
    }

    fclose( $_pointer );
    $_SESSION[ 'encrypt' ] = $_encrypt;
    $_inhoud .= "<form  method='post' action='$_srv'>
    <label> &nbsp; &nbsp; &nbsp; &nbsp; Encryption function (relatief tegenover de root folder)</label>
    <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
      <input type='text' name='encrypt' size='100' value=$_encrypt>
      <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
      <input type=submit name=submitENC value='Pas aan'></form><hr>";

    //scripts

    $_pointer = fopen( 'parameters/scripts.csv', 'rb' );
    if ( ! $_pointer ) {
        throw new Exception( 'Error opening scripts.csv' );
    }
    $_record="";

    while( ! feof( $_pointer ) ) {
      $_record=(fgetcsv($_pointer));
      
        list($_var)=$_record;

     
        if ( $_var != '' ) {
          $_scripts = $_record;
      }
     
    }

    fclose( $_pointer );


     $_SESSION[ 'scripts' ] = $_scripts;
    
     $_first=true;
     $_scriptsOut="";
     foreach($_scripts as $_var)
     {
       if (!$_first)
       {
         $_scriptsOut.=",";
       }
       $_scriptsOut.=$_var;
       $_first=false;
     }

     $_inhoud .= "<form  method='post' action='$_srv'>
    <label> &nbsp; &nbsp; &nbsp; &nbsp; Folder(s) met scripts (relatief tegenover de root folder) gescheiden door een &quot;,&quot; (komma)<br></label>
    <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
      <input type='text' name='scripts' size='100' value=$_scriptsOut>
      <br><br> &nbsp; &nbsp; &nbsp; &nbsp; 
      <input  type=submit name=submitSCRIPT value='Pas aan'></form>";

    $_inhoud .= " 
      <br><hr><hr>
      <script>
      var nu = new Date();
      copyright_string = '&copy;' + nu.getFullYear() + ' Micky De Pauw';		 
      document.write(copyright_string);
      </script>";


      $_SESSION[ 'ok' ] = true;
    echo $_inhoud;

} catch ( Exception $_e ) {
    echo ( "<hr>
    <strong>Exception</strong><br><br>
    Foutmelding: ".$_e->getMessage()."<br><br>
    Bestand: ".$_e->getFile()."<br>
    Regel: ".$_e->getLine().'<br><hr>' );
}

?>