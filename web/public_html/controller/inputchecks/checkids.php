<?php
	function checkuserID()
	{
		$libtoroot= __DIR__."/../../";
		include $libtoroot."model/page_states.php";
		$checkFlag = $PASS;
		/* Campaign id is xpected to be passed */
               	if(isset($_GET['userid']))
                {
                        $tmp = $_GET['userid'];

			/* Campaign Ids are supposed to be numbers */
                        if (! is_numeric($tmp))
			{ 
				$checkFlag = $FAIL;/* Non numeric campaign ids*/ 
			}
		}
		else 
		{

			$checkFlag = $FAIL; /*Missing Campaign id */
		}
			
		return $checkFlag;
	}
	
	function checkuserinput()
	{
		$libtoroot= __DIR__."/../../";
		include $libtoroot."model/page_states.php";
		$checkFlag = $PASS;
		/* Campaign id is xpected to be passed */
               	if(isset($_GET['userinput']))
                {
                        $tmp = $_GET['userinput'];

			/* Campaign Ids are supposed to be numbers */
                        if (! is_numeric($tmp))
			{ 
				$checkFlag = $FAIL;/* Non numeric campaign ids*/ 
			}
		}
		else 
		{

			$checkFlag = $FAIL; /*Missing Campaign id */
		}
			
		return $checkFlag;
	}
	function checkSQLCreds($dbrServerName)
	{
		$libtoroot= __DIR__."/../../";
		include $libtoroot."model/page_states.php";
		include $libtoroot."controller/connections/connection_variables.php";
		$checkFlag = $FAIL;
		$USER_NAME_COOKIE = "ERROR"; 
		$USER_PASSWORD_COOKIE = "ERROR"; 
		if($dbrServerName == $DB_SERVERNAME_SRVA)
		{
			$USER_NAME_COOKIE = $DB_SRVA_USER_COOKIE_NAME;
			$USER_PASSWORD_COOKIE = $DB_SRVA_PASSWORD_COOKIE_NAME; 
		}
		elseif($dbrServerName == $DB_SERVERNAME_SRVB)
		{
			$USER_NAME_COOKIE = $DB_SRVB_USER_COOKIE_NAME;
			$USER_PASSWORD_COOKIE = $DB_SRVB_PASSWORD_COOKIE_NAME; 
		}
		elseif($dbrServerName == $DB_SERVERNAME_SRVC)
		{
			$USER_NAME_COOKIE = $DB_SRVC_USER_COOKIE_NAME;
			$USER_PASSWORD_COOKIE = $DB_SRVC_PASSWORD_COOKIE_NAME; 
		}
		
		if(isset($_COOKIE[$USER_NAME_COOKIE]))
		{
			if(isset($_COOKIE[$USER_PASSWORD_COOKIE]))
			{
				$checkFlag = $PASS;
			}
		}	
		return $checkFlag;
	}
	

?>
