<?php
header('Content-Type: application/xml');

$request = curl_init("http://www.fuelcard.ie/");
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($request);
curl_close($request);

preg_match('/Petrol: ([0-9.]+) cent per litre/', $response, $matches);
$prices['petrol'] = $matches[1];
preg_match('/Diesel: ([0-9.]+) cent per litre/', $response, $matches);
$prices['diesel'] = $matches[1];
?>
<?xml version="1.0"?>
<prices>
	<price fuel="Petrol"><?php echo($prices['petrol']);?></price>
	<price fuel="Diesel"><?php echo($prices['diesel']);?></price>
</prices>
