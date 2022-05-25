<?php
require("../connections/pdo.inc.php");

$_postnummer = $_GET['p'];

$_result = $_PDO -> query("SELECT d_gemeenteNaam FROM t_gemeente WHERE d_postnummer = '$_postnummer';");

if ($_result -> rowCount() > 0)
{
	while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
	{
		echo($_row['d_gemeenteNaam']);
		break;
	}
}
else
{
	echo "Foutieve postcode !";
}






?>