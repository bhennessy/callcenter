<?php

/// Include the Twilio PHP library
	require 'Services/Twilio.php';

	// Twilio REST API version
	$version = "2010-04-01";
// Twilio Phone Number - the one you purchased from Twilio. Formatted: "408-985-2034"
	$PhoneNumber = "636-352-1385";
	
	//Get phone number to call
	
	$phoneToCall = $_REQUEST['p'];

// Set our AccountSid and AuthToken 
    $AccountSid = "ACd51b0ecea23a1f9fd1024a5cdc3b022f";
    $AppSid = "APa509e91bd52ffa51bd2b7b7a37bbebcb";
    $AuthToken = "4d09ccad7b5eb9d89c12b9f44912fd0e";
    
    // Outgoing Caller ID you have previously validated with Twilio 
    $CallerID = '636-346-1196';

// Instantiate a new Twilio Rest Client 
try{
	//$client = new TwilioRestClient($AccountSid, $AuthToken);
	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken, $version);
}
catch(Exception $e){
	writeToFile('Twilio exception: '.$e);
}

//A little local test, shall we?  Call my cell phone and say "Hi"

try {
        // Initiate a new outbound call
        
        $call = $client->account->calls->create(
            $PhoneNumber, // The number of the phone initiating the call
            $phoneToCall, // The number of the phone receiving call
            //$phoneToCall, // 'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
            'http://hennessygrp.com/callcenter/script.xml' //The URL Twilio will request when the call is answered
        );
        echo 'Started call: '. $phoneToCall ." " . $call->sid;

    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
		writeToFile($e->getMessage());
    }
// For debugging purposes.
function writeToFile($content)
{	
	$handle = fopen("logs/log.txt", "a");
	$today = $today = date("m.d.y, g:i a");                 // March 10, 2001, 5:16 pm
	fwrite($handle, $today . ": " . $content."\r\n");
	fclose($handle);
}
?>