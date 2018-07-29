<?php
		
	
	function pullResultSetSrvA($sqlQuery)
	{
		$libtoroot= __DIR__."/../../";
                include $libtoroot."controller/connections/connection_variables.php";
		$server = $DB_SERVERNAME_SRVA
		$resultSet = pullResultSet($server,$_COOKIE[$DB_SRVA_USER_COOKIE_NAME], $_COOKIE[$DB_SRVA_PASSWORD_COOKIE_NAME],$sqlQuery);
		return $resultSet;
	}


	function pullResultSet($server, $username, $password, $sqlQuery)
	{
		try
		{
			$link = new PDO("dblib:host=$server",$username, $password);
			$stmt = $link->prepare($sqlQuery);
			$stmt->execute();
			$resultSet = array();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			return $resultSet;
		       		
		}
		catch(PDOException $e)
		{
			return "Error : <b>".$e->getMessage()."</b>";
		}	
	}

	
?>
