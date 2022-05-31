<?php
try
{

  //********** Initialisatie
  require("../code/initialisatie.inc.php"); 

  //********** Input en verwerking
  if (! isset($_POST["submit"]))  // formulier klaar maken
  {
    $_start=1; // start waarde voor drop-downs
    $_inhoud = "<h1>Toevoegen</h1>";
    require("../code/selectionForm.inc.php"); 
  }
  else // inhoud formulier verwerken
  {
    // input uitpakken
    require("../code/inputUitpakken.inc.php");

    $_gemeentePK = PK_t_gemeente($_postcode, $_gemeenteNaam);

    //**********  consistency checks
    // nakijken of "nieuw lid" al bestaat 
    // Query samenstellen			
    require("../code/useCreateSelect.inc.php");		
    // Query naar DB sturen
    $_result = $_PDO -> query("$_query"); 
    // Resultaat van query verwerken	   
    if ($_result -> rowCount() > 0) 
      // lid bestaat al
    {
      $_inhoud = "<br><br><h2> Lid is al ingevoerd!</h2>";	
    }
    else  // lid bestaat nog niet			
    {
      // Query samenstellen				
      $_query = "INSERT INTO t_leden (d_naam, d_voornaam, d_straat, d_nr, d_xtr, d_gemeente, d_tel, d_mob,  d_mail, d_gender, d_soort) VALUES ('$_naam', '$_voornaam','$_straat', '$_nr', '$_xtr', '$_gemeentePK', '$_telefoon','$_mob','$_mail', '$_gender', '$_soort');"; 
      // primary key wordt niet meegegeven. --> "auto -increment (ai)      
      // Query naar DB sturen
      $_result = $_PDO -> query("$_query");
      //nieuw lid is toegevoegd     
      $_inhoud = "<br><br><br><br><br><br><h2>Lid &nbsp;&nbsp;$_voornaam &nbsp;&nbsp;$_naam&nbsp;&nbsp;is toegevoegd</h2>";
    }
  }

  //********** output
  // menu initialiseren  
  $_menu =  1;
  // linkse commentaar veld  
  $_commentaar = 'L_toevoegen_C.html';  
  require("../code/output.inc.php");
}

catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}
?>