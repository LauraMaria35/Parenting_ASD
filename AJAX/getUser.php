<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

require("pdo.inc.php");
$_sql="SELECT * FROM t_leden WHERE d_lid = '".$q."'";
$_result = $_PDO->query($_sql);

echo "<table>
<tr>
<th>User ID</th>
<th>Firstname</th>
<th>Lastname</th>
</tr>";
while($_row = $_result-> fetch(PDO::FETCH_ASSOC))  {
  echo "<tr>";
  echo "<td>" . $_row['d_lid'] . "</td>";
  echo "<td>" . $_row['d_naam'] . "</td>";
  echo "<td>" . $_row['d_voorNaam'] . "</td>";
  echo "</tr>";
}
echo "</table>";
?>
</body>
</html>