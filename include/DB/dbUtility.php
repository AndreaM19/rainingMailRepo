<?php
/*PHP Database Functions*/
class dbUtility{
	
	/*Open connection to a Database*/
	public static function connectToDB($host, $user, $password, $db){
		$conn = mysql_connect($host, $user, $password) or die;
		mysql_select_db($db, $conn);
		return $conn;
	}

	/*Close a connection to a Database*/
	public static function disconnectFromDB($connToClose){
		mysql_close($connToClose);
	}

}
?>