<?php
try
{
  //********** Initialisatie
  require("../code/initialisatie.inc.php"); 

  //********** Input en verwerking
  //********** >>>>>> opgepast <<<<<< ************ 
  // 2 soorten formulieren 	

  if (! isset($_POST["submit"]) && ! isset($_POST["submitC"]))  
    // geen van beide formulieren  --> formulier klaar maken
  {
    // toon 1ste formulier formulier --> selectie formulier

    $_start=0; // start waarde voor drop-downs
    $_inhoud ="<h1>Verwijderen</h1>";
    require("../code/selectionForm.inc.php"); 
  }
  else if (isset($_POST["submit"])) // inhoud selectie formulier verwerken
  {
    // input uitpakken	
    require("../code/inputUitpakken.inc.php");

    //********** consistency checks	
    // nakijken of "te verwijderen lid" wel bestaat		
    // Query samenstellen			
    require("../code/useCreateSelect.inc.php");

    // Query naar DB sturen
    $_result = $_PDO -> query("$_query"); 

    // Resultaat van query verwerken		
    if ($_result -> rowCount() == 0)
      // gezocht lid bestaat niet			
    {
      $_inhoud = "<br><br><br><br><br><br><h2>Geen records gevonden voor deze input</h2><br><a href='$_srv'>volgende</a>";
    }
    else  
    {
      // te verwijderen lid bestaat wel
      while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
      {
        //toon alle gevonden leden 				
        require("../code/toonData.inc.php");
        // confirmatie formulier toevoegen
        //per "lid"	een formulier met hierbij de bijhorende key uit t_leden/v_leden als hidden parameter	
        $_inhoud.="
      <form  method=post action='$_srv'>
        <input type=hidden name=lidnr  value='".$_row['d_lidnr']."'>
        <input type =hidden name=voornaam value='".$_row['d_voornaam']."'>
        <input type =hidden name=naam value='".$_row['d_naam']."'>
				    <input type=submit name=submitC  value=Verwijder>
      </form><br><br><hr><br>\n";	

      }
    }
  }	
  else //bevestigings formulier met te verwijderen lid
  {
    // input uitpakken
    $_lidnr = $_POST['lidnr'];
    $_naam = $_POST['naam']; 
    $_voornaam = $_POST['voornaam'];

    // Query samenstellen
    $_query ="DELETE FROM t_leden WHERE d_lidnr = $_lidnr;"; 

    // Query naar DB sturen
    $_result = $_PDO -> query($_query); 

    //lid is verwijderd	  
    $_output = "<h2>Lid $_voornaam $_naam is verwijderd.</h2><br><a href='$_srv'>volgende</a>";

  }


  //********** output
  // menu initialiseren  
  $_menu =  1;
  // linkse commentaar veld  
  $_commentaar = 'L_verwijderen_C.html';

  require("../code/output.inc.php");
}

catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}

?>