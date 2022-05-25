<?php
try
{
  //********** Initialisatie
  require("../code/initialisatie.inc.php"); 

  //********** Input en verwerking
  if (!isset($_POST["submit"]))  // formulier klaar maken
  {
    $_start=0; // start waarde voor drop-downs
    $_inhoud= "<h1>Leden tonen</h1>";
    require("../code/selectionForm.inc.php");  
  }
  else // inhoud formulier verwerken
  {
    
    // input uitpakken
    require("../code/inputUitpakken.inc.php");
    
    // Query samenstellen
    require("../code/useCreateSelect.inc.php");
  
    // Query naar DB sturen
    $_result = $_PDO -> query("$_query"); 
    
    // Resultaat van query verwerken
    if ($_result -> rowCount() == 0)	
    {
      $_inhoud = "<h2>Geen records gevonden voor deze input</h2>";
    }
    else
    {   
      while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
      {
        require("../code/toonData.inc.php");
        $_output.="<hr>";
      }
    }
  }

  //********** output
  // menu initialiseren  
  $_menu = 1;
  // linkse commentaar veld  
  $_commentaar = "L_lezen_C.html";
  require("../code/output.inc.php");
}

catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}

?>