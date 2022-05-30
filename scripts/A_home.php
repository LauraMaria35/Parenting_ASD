<?php
try
{
//********** initalisatie
  require("../code/initialisatie.inc.php");

//********** Input en verwerking
  require_once("../php_lib/inlezen.inc.php");
// de inhoud van A_home_I zal in het "inhoud" veld  op het scherm komen
  $_inhoud = inlezen('A_home.html');

//********** output
// menu definieren  
  $_menu =  0;
// commentaar file definieren  

 require("../code/output.inc.php"); 
}
 
catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}
?>