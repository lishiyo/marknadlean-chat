<?php

	//include main functionality (DB connect, etc) - calls on db.php and dbShortcuts.php, connect to settings.php and get credentials
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	
	//add a chat from a username
	//timestamp is automatically set, so not a parameter
	//$ means variable in PHP (specific to PHP)
	function addGetChat($userN, $mes){
		//dbQuery = writing info into tableName (columnName)
		dbQuery("INSERT INTO chat (username, message) VALUES ('$userN', '$mes')");
		//dbMassData in db.php file
		//* = all, DESC = descending, limit to last 10 messages added
		//get the data via query
		$chatHistory = dbMassData("SELECT * FROM chat ORDER BY timestamp DESC LIMIT 10")
		$resp  = array("status"=>"success", "reason"=>"chat added", "data"=>$chatHistory);
		return($resp);
	}
	




?>