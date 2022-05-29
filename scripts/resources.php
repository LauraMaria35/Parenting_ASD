<?php
try{
  $_inhoud = file_get_contents("../content/resources.html");
  //$_smarty instantieren en initialiseren  
  require_once("../smarty/mySmarty.inc.php");
	
  $_smarty->assign('inhoud',$_inhoud);
  // display it
    $_smarty->display('aboutGuideResources.tpl');

}

catch (Exception $_e)
{
  // exception handling funtions 
  include("../php_lib/myExceptionHandling.inc.php"); 
  echo myExceptionHandling($_e,"../logs/error_log.csv");
}