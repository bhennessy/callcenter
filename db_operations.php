<?php

/**
 * @category   Class
 * @package    Database
 * @author     Original Author <billhennessy@me.com>
 * @copyright  The Hennessy Group LLC
 * @version    Release: @package version 1
 * 
 */
class dbOperations{

/**
 * function insertUser
 * @param string $from, object $db
 * @return int 
 */
function insertUser ($from, $db){
	//Connect To Database
	$qryString = "INSERT INTO  `db66109_phonetree`.`phone_tree` (
		`ID` ,
		`From` ,
		`Confirmed` ,
		`Unsubscribed` ,
		`Last_Update`
		)
		VALUES (
		NULL ,  '".$from."',  '1',  '0', 
		CURRENT_TIMESTAMP
	);";

	$result = $db->qry($qryString);
	return $result;
}

/**
 * function confirmUser
 * @param string $from
 * @param int $digits
 * @return int
 */
function confirmUser($from, $db){
		$qryString = "UPDATE phone_tree
		SET Confirmed = 1,
		Unsubscribed = 0, 
		`Last_Update` = CURRENT_TIMESTAMP 
		WHERE `From` = '".$from."';";

	$result = $db->qry($qryString);
	return $result;
}

/**
 * function unsusbscribe
 * @param string $from
 * @param string $digits
 * 
 */
function unsubscribe($from, $db){
	
		$qryString = "UPDATE phone_tree
		SET Confirmed = 0, 
		Unsubscribed = 1,
		`Last_Update` = CURRENT_TIMESTAMP 
		WHERE `From` = '".$from."';";

	$result = $db->qry($qryString);
	return $result;
}

/**
 * function getUser
 * @param string $from
 * return db result
 */
function getUser($from, $db){
			$qryString = "SELECT *
			FROM phone_tree
			WHERE `From` = '".$from."';";

	$result = $db->qry($qryString);
	return $result;
}

/**
 * function getUser
 * @return db result
 */
function getUsers($limit, $db){

			$qryString = "SELECT *
			FROM phone_tree
			;";
			$result = $db->qry($qryString);
			return $result;
}

function getConfirmedUsers($limit, $db){

			$qryString = "SELECT *
			FROM phone_tree
			WHERE Confirmed=1 AND Unsubscribed=0;";
			$result = $db->qry($qryString);
			return $result;
}

}
?>