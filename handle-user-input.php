<?php
    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
 
    echo '<Response>';
 
    # @start snippet
    $user_pushed = (int) $_REQUEST['Digits'];
	$user_phone = $_REQUEST['From'];
	$actionString = "handle-phonetree-register.php";//?From=".$user_phone;
	$user_phone_array = str_split($user_phone);
	
    # @end snippet
 
    if ($user_pushed == 1)
    {
        echo '<Say>Our next After Party is Thursday, November seventeenth at 7 oclock p m.  The location is Sky 
        Music Lounge, 930 Kehrs Mill Road in Ballwin, Missouri, at the corner of Kehrs Mill and Clayton Road.  
        The activity for this month is, meet with all five people you selected for your network.</Say>';
		echo "<Say voice='woman'>Thanks for calling Saint Louis Tea Party. Bye bye.</Say>";
    }
	elseif($user_pushed==2) {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Gather action='".$actionString ."' numDigits='1'>";
        echo "<Say voice='woman'>Thank you, for joining our automated phone tree.</Say>";
		echo "<Say>For your security, you must register for the phone tree from the phone on which you
				wish to receive our calls.</Say>";
		echo "<Say voice='woman'>If you would like to receive periodic phone calls informing you of important
			tea party events and news at </Say>"; 
			
			for($i=2;$i<=count($user_phone_array);$i++)
			{
				echo "<Say>" . $user_phone_array[$i] . "</Say>";
			}
		
		echo "<Say> Press seven now.</Say>";
		echo "</Gather>";
		
		echo "<Say voice='woman'>We'll return you to our main menu.</Say>";
        echo '<Redirect>handle-incoming-call.xml</Redirect>';
    }

	elseif($user_pushed==3) {
        // We'll implement the rest of the functionality in the 
        // following sections.
        echo "<Say>Sorry, I can't do that yet, either.</Say>";
		echo "<Say voice='woman'>We'll return you to our main menu.</Say>";
        echo '<Redirect>handle-incoming-call.xml</Redirect>';
    }
	else{
		echo "<Say>The choices were one through three. You pushed ".$user_pushed . ". Are you sure you're 
		not a Progressive?</Say>";
		echo "<Say voice='woman'>We'll return you to our main menu.</Say>";
        echo '<Redirect>handle-incoming-call.xml</Redirect>';
	}
 
    echo '</Response>';
?>