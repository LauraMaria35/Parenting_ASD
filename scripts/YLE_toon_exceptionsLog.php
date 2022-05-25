<?php

try{
require("../code/initialisatie.inc.php");
  
/*******************************************
*    Input en verwerking
********************************************/
if (! isset($_POST["submit"]))  // geen formulier 
{
	// toon  formulier
  
// default - waarde voor datumvelden (start - einde)  
// let op datum formaat voor formulier --> "jaar-maand-dag" 
  $_vandaag =strftime("%Y-%m-%d");

  $_inhoud="
   <h1>Exception-log</h1> 
   <p>Toon exceptions tussen</p>  
   <form  method=post action='$_srv'>
      <input type=date name=start value='$_vandaag'>
      <input type=date name=einde value='$_vandaag'>
      <div class=clearfix></div>
      <br>
		    <input type=submit name=submit  value=toon>
    </form>";
}
else // inhoud formulier verwerken
{
// input uitpakken (start en eind)
// let op datum formaat uit formulier --> "jaar-maand-dag"  
  
// Startdag omzetten naar timestamp (0 uur 0 min 0 sec) 
// jaar, dag, maand splitsen 
  $_sDatum = $_POST['start'];
  list($_jaar, $_maand, $_dag) = explode("-",$_POST['start'],3);
// start-datum voor in scherm output
  $_sDatum = $_dag."-".$_maand."-".$_jaar;

// om te kunnen gebruiken in vergelijkingen -> 
// omzetten naar naar timestamp -->
// mktime(uur,min,sec,maand,dag,jaar)
  $_start= mktime(0,0,0,$_maand,$_dag,$_jaar);
   
// Eind dag omzetten naar timestamp (23 uur 59 min 59 sec) 
// jaar, dag, maand splitsen  
  list($_jaar, $_maand, $_dag) = explode("-",$_POST['einde'],3);
                                                    
// Eind-datum voor in scherm output
  $_eDatum = $_dag."-".$_maand."-".$_jaar;

// om te kunnen gebruiken invergelijkingen -> 
// omzetten naar naar timestamp -->
// mktime(uur,min,sec,maand,dag,jaar)
  $_einde= mktime(23,59,59,$_maand,$_dag,$_jaar);

  
  
/****************************************
 *    CSV file ../logs/error_log.csv    *
 *    verwerken                         *
 ****************************************/    
  
// csv file openen  
  $_pointer = fopen("../logs/error_log.csv","rb");
  
  if (! $_pointer)
  {
    throw new Exception("Opening error_log failed");
  }
  
  $_inhoud="";
  
  $_exceptionCounter=0;
// csv file uitlezen  
  while(! feof($_pointer))
  {
	   $_error_log =fgetcsv($_pointer);	 
       
    if (! feof($_pointer))
	   {
// inhoud CSV splitsen     
      list($_tijd, $_msg, $_script, $_lijn) = $_error_log;
      
// $_tijd bestaat uit 'dag- maand-jaar uur:min:sec'     
// inhoud $_tijd exploderen op basis van ' ' 
// en splitsen in 2 delen datum en tijd 
      list($_d, $_t) = explode(" ",$_tijd,2);
   
// inhoud $_d exploderen op basis van '=' 
// en splitsen in 3 delen jaar maand dag  
// let op formaat in $_d is 'dag- maand-jaar'  
      list($_dag, $_maand, $_jaar) = explode("-",$_d,3);     
// errorDatum is omlzetten naar timestamp      
      $_errorDatum= mktime(0,0,0,$_maand,$_dag,$_jaar);
            
      if ($_errorDatum >= $_start && $_errorDatum <= $_einde) 
// enkel tonen indien fout tussen start en eind        
      { 
// omgekeerde volgorde
        $_inhoud="
        <p>
        <span class=errorLabel>Wanneer :</span>$_tijd<br>
        <span class=errorLabel>script :</span>$_script<br> 
        <span class=errorLabel>lijn nr :</span>$_lijn<br>
        <span class=errorLabel>Wat :</span>$_msg
        </p>
        <hr><br>".$_inhoud;
        
        $_exceptionCounter++;
        
       }
     }
	 }

  
//titel vooraan plaatsen
  $_inhopud="<h1>Exceptions</h1>
            <br>
            <p> <strong>$_exceptionCounter</strong> exceptions tussen $_sDatum ('s morgens)
            en $_eDatum ('s avonds)</p>".$_inhoud;
  
  fclose($_pointer);
}

/*******************************************
*    output
********************************************/  
// menu definieren  
  $_menu = 112;
// commentaar file definieren  
  $_commentaar = "leeg.html";
  
  require("../code/output.inc.php");
}

catch (Exception $_e)
{
 // exception handling funtions 
  include("../php_lib/myExceptionHandling.inc.php"); 
  echo myExceptionHandling($_e,"../logs/error_log.csv");
}
?>