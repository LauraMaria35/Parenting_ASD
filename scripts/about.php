<?php
try{
    require("../code/initialisatie.inc.php");

//********** Input en verwerking
  require_once("../php_lib/inlezen.inc.php");
// de inhoud van A_home_I zal in het "inhoud" veld  op het scherm komen
  $_inhoud = inlezen('about.html');

  require("../code/output.inc.php"); 

    require("../smarty/mySmarty.inc.php");
   
    $_smarty->display('aboutGuideResources.tpl');

   
}

catch (Exception $_e)
{
  // exception handling funtions 
  include("../php_lib/myExceptionHandling.inc.php"); 
  echo myExceptionHandling($_e,"../logs/error_log.csv");
}
?>