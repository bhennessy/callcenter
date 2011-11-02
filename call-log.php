<?php
	// Include the Twilio PHP library
	require 'Services/Twilio.php';

	// Twilio REST API version
	$version = '2010-04-01';

	// Set our AccountSid and AuthToken
	$sid = 'ACd51b0ecea23a1f9fd1024a5cdc3b022f';
	$token = '4d09ccad7b5eb9d89c12b9f44912fd0e';

	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);

	try {
		// Get Recent Calls
		foreach ($client->account->calls as $call) {
			echo "Call from $call->from to $call->to at $call->start_time of length $call->duration<br />";
		}
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
