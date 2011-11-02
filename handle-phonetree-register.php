<?php
   header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<Response>';

	include "config.php";
	include "dbUtil.php";
	include 'db_operations.php';
	
	
	$user_phone = $_REQUEST['From'];
	$digits = $_REQUEST['Digits'];
	$user_phone_array = str_split($user_phone);

//Insert into database
	try{
		$db = DB::Open($dbname,$hostname,null,$username,$password);
		$dbo = new dbOperations();
		
		$result = $dbo->insertUser($user_phone,$db);
		if($result != 1)
		{
			echo "<Say voice='woman'>Error: ".$result."</Say>";	
			echo "<Say voice='woman'>We're sorry. There has been a system error. Please try again tomorrow. Goodbye!</Say>";
			echo "</Response>";
		}
	}catch(exception $e){
		writeToFile($e->message);
	}


echo "<Say>Thanks. We have added you to the phone tree.</Say>";
echo "<Say voice='woman'>You will receive occasional phone calls from Saint Louis Tea Party about important events. We will
	call you at this number:</Say>";
			for($i=2;$i<=count($user_phone_array);$i++)
			{
				echo "<Say voice='woman'>" . $user_phone_array[$i] . "</Say>";
			}
echo "<Say>We are glad you have joined the Tea Party automated phone tree. 
	We will call you shortly to confirm your information.  Bye bye.</Say>";

	echo '</Response>';


?>