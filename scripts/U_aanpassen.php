<?php
try
{
  //********** Initialisatie
  // functie om de primary key van t_gemeente op te zoeken op basis van gemeente naam en/of postcode
  require("../code/initialisatie.inc.php"); 

  //********** Input en verwerking
  if (! isset($_POST["submit"]))  // geen formulier 
  {
    $_start=0; // start waarde voor drop-downs
    $_inhoud=  "<h1>Aanpassen</h1>";
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
      $_inhoud = "<h2>Geen leden gevonden voor deze input</h2>";
    }
    else
    {
      while ($_row = $_result -> fetch(PDO::		FETCH_ASSOC)) 
      {
        //toon alle gevonden leden 				  
        require("../code/toonData.inc.php");
        $_output.=
          "\n<br><br><form  method='post' action='../scripts/L_data_aanpassen.php'>
        <input name='lid' type='hidden' value='".$_row['d_lid']."'>
        <input  type=submit name=submitC value='Pas aan'></form>\n<br><hr><br>";

        // per "lid"	een formulier met hierbij de bijhorende key uit t_leden/v_leden als hidden parameter	action -->	../scripts/L_data_aanpassen.php									
      }
    } 			
  }

  ///********** output
  // menu initialiseren  
  $_menu =  1;
  // linkse commentaar veld  
  $_commentaar = 'L_aanpassen_C.html';

  require("../code/output.inc.php");
}

catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}

?>