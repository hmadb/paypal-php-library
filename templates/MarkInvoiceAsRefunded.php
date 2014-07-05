<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../autoload.php');


// Create PayPal object.
$PayPalConfig = array(
					  'Sandbox' => $sandbox,
					  'DeveloperAccountEmail' => $developer_account_email,
					  'ApplicationID' => $application_id,
					  'DeviceID' => $device_id,
					  'IPAddress' => $_SERVER['REMOTE_ADDR'],
					  'APIUsername' => $api_username,
					  'APIPassword' => $api_password,
					  'APISignature' => $api_signature,
					  'APISubject' => $api_subject, 
					  'PrintHeaders' => $print_headers
					);

$PayPal = new angelleye\PayPal\Adaptive($PayPalConfig);

// Prepare request arrays
$MarkInvoiceAsRefundedFields = array(
								'InvoiceID' => '', 			// Required.  ID of the invoice to mark paid.
								'Note' => '', 				// Optional note associated with the payment.
								'Date' => ''				// Date the invoice was paid.
							);

$PayPalRequestData = array('MarkInvoiceAsRefundedFields' => $MarkInvoiceAsRefundedFields);

// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->MarkInvoiceAsRefunded($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>