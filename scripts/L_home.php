<?php
try
{
//********** initalisatie
require("../code/initialisatie.inc.php");

//********** Input en verwerking
  require_once("../php_lib/inlezen.inc.php");
// de inhoud van L_home_I.html zal in het "inhoud" veld  op het scherm komen
   $_inhoud = inlezen('L_home_I.html');
  
//********** output
// menu definieren  
  $_menu =  1;
// commentaar file definieren  
  $_commentaar = 'leeg.html';
  require("../code/output.inc.php"); 
}
 
catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}
?>