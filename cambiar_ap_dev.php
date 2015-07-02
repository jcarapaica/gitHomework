<?php

	require_once('../lib/nusoap.php');
	$numctrlDate = new DateTime();
	$client = new nusoap_client("<URL_CONFIDENCIAL>", true);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;

	$error = $client->getError();
	if ($error) {
		echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	}

	// Ejemplo para el caso de estatus SHIPPED:
	/*$response = $client->call("notifyStatusChange", 
		array(	"controlNumber" => "MB-MX-1-11242014-101-01748",
				"status" => "SHIPPED",
				"additionalParameters" => serialize(array(
						'trackingNumber' => 'US-TEST-001-007',
						'courier' => 'UPS'))
		));*/

	// Ejemplo para el caso de estatus SUBSTITUTED:
	/*$response = $client->call("notifyStatusChange", 
		array(	"controlNumber" => "MB-MX-1-11242014-101-01748",
				"status" => "SUBSTITUTED",
				"additionalParameters" => serialize(array(
						'newPrize' => 'VALE MACYS MXN$1,000'))
		));*/

	// Ejemplo para el caso de estatus REJECTED:
	$response = $client->call("notifyStatusChange", 
		array(	"controlNumber" => "AC-PE-1-230315-47-5",
				"status" => "REJECTED"
		));

	// Ejemplo para el caso de estatus CANCELLED:
	$response = $client->call("notifyStatusChange", 
		array(	"controlNumber" => "AC-PE-1-240315-47-6",
				"status" => "CANCELLED"
		));

echo "<pre>";
var_dump ( $response );
echo "</pre>";
echo "<br /	>";
echo "DAME ERROR: ".$client->getError ();

echo nl2br ( htmlentities ( $client->response ) );


?>