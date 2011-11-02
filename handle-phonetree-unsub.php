<?php
   header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<Response>';

	include "config.php";
	include "dbUtil.php";
	include 'db_operations.php';
	
	$user_phone = $_REQUEST['From'];
	//$digits = $_REQUEST['Digits'];
	//$user_phone_array = str_split($user_phone);
	if(is_nan($user_phone)){
		$user_phone = "+1".$phoneToCall;
	}

echo "<Say>Just a moment, while we unsubscribe your phone number in our database.</Say>";
//Update database
	try{
		$db = DB::Open($dbname,$hostname,null,$username,$password);
		$dbo = new dbOperations();
		
		$result = $dbo->unsubscribe($user_phone,$db);
		$db->__destruct();
		if($result != 1)
		{
			echo "<Say voice='woman'>Error: ".$result."</Say>";	
			echo "<Say voice='woman'>We're sorry. There has been a system error. Please try again tomorrow. Goodbye!</Say>";
			echo "</Response>";
		}
	}catch(exception $e){
		writeToFile($e->message);
	}


echo "<Say>We are sorry to see you go. 
		We hope you will continue to follow the Tea Party at www dot saint louis tea party dot com.</Say>";
echo "<Say voice='woman'>If you should decide to get back on the phone tree, please call us at 
		six-three-six, three-five-two, thirteen eighty-five</Say>";
echo "<Say>In the meantime, keep America free and brave.  good bye.  </Say>";

echo '</Response>';


?>