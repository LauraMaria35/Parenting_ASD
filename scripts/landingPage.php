<?php
try
{

echo file_get_contents("../content/landingPage.html"); 
 
}
 
catch (Exception $_exception) //********** exception handling
{
  require("../php_lib/myExceptionHandling.inc.php"); 
}
?>