<?php
try{
//********** Input en verwerking
  require_once("../php_lib/inlezen.inc.php");
// de inhoud van about.html zal in het "inhoud" veld  op het scherm komen
  $_inhoud = inlezen('about.html');
  $_menu =  0;
  require("../code/output.inc.php"); 
   
 $_smarty->display('aboutGuideResources.tpl');

   
}

catch (Exception $_e)
{
  // exception handling funtions 
  include("../php_lib/myExceptionHandling.inc.php"); 
  echo myExceptionHandling($_e,"../logs/error_log.csv");
}
?>