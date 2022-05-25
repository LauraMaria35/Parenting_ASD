<?php
require("../connections/pdo.inc.php");
$_gemeenteNaam = $_GET['n'];

$_result = $_PDO -> query("SELECT d_postnummer FROM t_gemeente WHERE d_gemeenteNaam = '$_gemeenteNaam';");

if ($_result -> rowCount() > 0)
{
	while ($_row = $_result -> fetch(PDO::		FETCH_ASSOC)) 
	{
		echo($_row['d_postnummer']);
		break;
	}
}
else
{
	echo "Foute postcode";
}

?>