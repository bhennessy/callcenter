<?php

//Connect To Database

$hostname = $_ENV{'DATABASE_SERVER'};
$username='db66109_3521385';
$password='memorainlog';
$dbname='db66109_phonetree';
//$usertable='your_tablename';
//$yourfield = 'your_field';

//test connection
/*
$con = mysql_connect($hostname,$username,$password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($dbname, $con);

$result = mysql_query("SELECT * FROM phone_tree");

while($row = mysql_fetch_array($result))
  {
  echo $row['ID'] . " " . $row['From'];
  echo "<br />";
  }

mysql_close($con);
*/	
?>