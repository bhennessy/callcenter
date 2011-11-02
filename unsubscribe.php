<?php

// page located at http://example.com/process_gather.php

$digits = $_REQUEST['Digits'];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
if($digits==9){
	echo "<Response><Say>You entered " . $digits . " We will not call you again. Thank you.</Say></Response>";
}
else{
	echo "<Response><Say>You entered " . $digits . " We will keep you enrolled. If you entered ".$digits . " by mistake, please call 314-352-1385 to unsubscribe from the phone tree.  Thanks.</Say></Response>";
}
?>