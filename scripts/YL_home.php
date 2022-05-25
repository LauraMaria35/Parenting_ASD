<?php
try
{
require("../code/initialisatie.inc.php");

/*******************************************
*    (Input en) verwerking
********************************************/

// welkom.txt zal in het "inhoud" veld  op het scherm komen
  require_once("../php_lib/inlezen.inc.php");
  $_inhoud = inlezen('YL_home_l.html');

  
/*******************************************
*    output
********************************************/  
// menu definieren  
  $_menu =  111;
// commentaar file definieren  
  $_commentaar = 'leeg.html';
  
  require("../code/output.inc.php");
  
}
 
catch (Exception $e)
{
 // exception handling funtions 
  include("../php_lib/myExceptionHandling.inc.php"); 
  echo myExceptionHandling($_e,"../logs/error_log.csv");
}



?>