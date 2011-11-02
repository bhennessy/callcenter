<?php

include 'config.php';
include 'dbUtil.php';
include 'db_operations.php';


?>

<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
    $("p").append(" <b>W3Schools</b>.");
  });
});
</script>
</head>

<body>
	<?
	echo $_ENV{'DATABASE_SERVER'};
	
	$from = "+19999999999";
	
	$db = DB::Open($dbname,$hostname,null,$username,$password);
	//Connect To Database
	
	//$result = insertUser($from,$db);
	//echo $result;
	?>
	
	<h3>Test unsubscribe($from, $db)</h3>
	<?
	
	$result = unsubscribe($from, $db);
	echo $result;
	?>
	<h3>Test getUser($from,$db)</h3>
	<?
	$result = getUser($from, $db);
	while($row = mysql_fetch_array($result))
	  {
	  echo $row['ID'] . " " . $row['From'] . " " . $row['Last_Update'];
	  echo "<br />";
	  }
	  
	  	?>
	<h3>Test getUsers($limit,$db)</h3>
	<?
	$result = getUsers($from, $db);
	while($row = mysql_fetch_array($result))
	  {
	  echo $row['ID'] . " " . $row['From'] . " " . $row['Last_Update'];
	  echo "<br />";
	  }
	  ?>
 <h3>Test getConfirmedUsers($limit,$db)</h3>
	<?
	$result = getConfirmedUsers(0, $db);
	while($row = mysql_fetch_array($result))
	  {
	  echo $row['ID'] . " " . $row['From'] . " " . $row['Last_Update'];
	  echo "<br />";
	  }
	
	/*
	$result = $db->qry("SELECT * FROM phone_tree");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['ID'] . " " . $row['From'];
	  echo "<br />";
	  }
	
	mysql_close($db);
		return 0;
	 * *
	 */	
	?>

</body>
</html>
