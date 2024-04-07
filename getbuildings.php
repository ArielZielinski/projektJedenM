<?php

/* AKTUALNIE NIEUŻYWANE  */

$mysqli = new mysqli("localhost", "Zielin", "seishiro594", "projektjeden");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT apartmentid, status, floor, measurement, price, about, pdf
FROM customers WHERE customerid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr, $city, $pcode, $country);
$stmt->fetch();
$stmt->close();

echo "<div class='tb1'>";
echo "<table>";
echo "<th>apartmentID</th>";
echo "<th>status</th>";
echo "<th>floor</th>";
echo "<th>measurement</th>";
echo "<th><button>price</button></th>";
echo "<th><button>about</button></th>";
echo "<th><button>pdf</button></th>";
echo "</table>";
echo "</div>";
?> 