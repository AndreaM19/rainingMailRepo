<?php
/*PHP Database Functions*/
class dbUtility{
	
	/*Open connection to a Database*/
	public static function connectToDB($host, $user, $password, $db){
		$conn = mysqli_connect($host, $user, $password, $db) or die ("An error is occured" . mysqli_error($conn));
		//mysqli_select_db($db, $conn);
		return $conn;
	}

	/*Close a connection to a Database*/
	public static function disconnectFromDB($connToClose){
		mysqli_close($connToClose);
	}
	
	/*Remove a contact from Database*/
	public static function removeContact($contactID){
		mysqli_query("DELETE FROM subscribers WHERE ID=".$contactID."");
		
	}

}
