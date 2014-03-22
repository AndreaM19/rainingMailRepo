<?php
//PHP Database Functions
function testFunction($message){
	echo $message;
}

//Open connection to a Database
function connectToDB($host, $user, $password, $db){
	$conn = mysql_connect($host, $user, $password) or die;
	mysql_select_db($db, $conn);
	return $conn;
}

//Close a connection to a Database
function disconnectFromDB($connToClose){
	mysql_close($connToClose);
}
?>