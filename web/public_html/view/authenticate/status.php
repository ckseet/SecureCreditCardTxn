<?php
        $torootdir = __DIR__."/../../";
	include $torootdir.'controller/tables.php';
 

	$status = $STATUS_NEW;
		//got phpsession
	if (isset($_POST['jiracloud']) && isset($_POST['username']) && isset($_POST['userpassword']))
	{
		if(isset($_COOKIE['jiracloud'])){ setcookie("jiracloud","na",time()-3600,"/"); }
		if(isset($_COOKIE['username'])){ setcookie("username","na",time()-3600,"/"); }
		if(isset($_COOKIE['jirasession'])){ setcookie("jirasession","na",time()-3600,"/"); }
		if(isset($_COOKIE['jirasessionname'])){ setcookie("jirasessionname","na",time()-3600,"/"); }


		//just go posted from form
		$jiracloud = $_POST['jiracloud'];
		$username = $_POST['username'];
		$userpassword = $_POST['userpassword'];
		$authenticateArray =array("Jira Cloud Instance"=>$jiracloud, "Username"=>$username,"Password"=>$userpassword);

	       	$auth_url="https://".$jiracloud."/rest/auth/1/session";
        	$body=array("username"=>$username, "password"=>$userpassword);
		$data_string =  json_encode($body);
		$ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $auth_url);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       	 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        	curl_setopt($ch, CURLOPT_POST, true);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        	curl_setopt($ch, CURLOPT_HEADER, true);
        	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            		'Content-Type:application/json',
            		'Content-Length: ' . strlen($data_string)));
        	$output = curl_exec($ch);
        	$header_size = curl_getinfo($ch,CURLINFO_HEADER_SIZE);
		$response_body = substr($output, $header_size);
		if(stripos($response_body, "session") !== false)
		{
			$response_array = json_decode($response_body, true);
			$cookie_array = $response_array['session'];
			$cookie_value = $cookie_array['value'];
			$cookie_name = $cookie_array['name'];
			// Check for errors
			if($output === FALSE){
			    die(curl_error($ch));
			}
			setcookie("jiracloud",$jiracloud,time()+ 86400,"/");
			setcookie("username",$username,time()+ 86400,"/");
			setcookie("jirasession",$cookie_value,time()+ 86400,"/");
			setcookie("jirasessionname",$cookie_name,time()+ 86400,"/");

			include $torootdir.'view/common/header_start.php';
	        	# include $torootdir.'view/pageconfig/header_resume.php';
	        	include $torootdir.'view/common/header_end.php';
	        	include $torootdir.'view/common/main_menu.php';
	        	include $torootdir.'view/common/col12_1border_10body_start.php';
		        print "<h1>Authenticate Status</h1>";

			echo "<h1>Attempted to Authenticate Using Below</h1>\n";	
			printVerticalInfoTableAssocArray($authenticateArray);
			echo "<h1>Succesfully authenticated</h1>\n";
			$jirasession = $cookie_value;
			$jirasessionname = $cookie_name;
			$authenticateArray =array("Jira Cloud Instance"=>$jiracloud, "Username"=>$username,"Jira Cloud Session Cookie Name"=>$jirasessionname, "Jira Cloud Session" => $jirasession);
			printVerticalInfoTableAssocArray($authenticateArray);
			$debug =1 ;
			if($debug ==1)
			{
				echo "<h2>Debug Mode Is on, Server Response was </h2>\n";
				echo "<pre>\n";
				var_dump($output);
				echo "/<pre>\n";
			}
        		include $torootdir.'view/common/col12_1border_10body_end.php';
		        include $torootdir.'view/common/footer.php';

		}
		else
		{
			include $torootdir.'view/common/header_start.php';
	        	# include $torootdir.'view/pageconfig/header_resume.php';
	        	include $torootdir.'view/common/header_end.php';
	        	include $torootdir.'view/common/main_menu.php';
	        	include $torootdir.'view/common/col12_1border_10body_start.php';
		        print "<h1>Authenticate Status</h1>";

			echo "<h1>Attempted to Authenticate Using Below</h1>\n";	
			printVerticalInfoTableAssocArray($authenticateArray);
			echo "<h1>Failed Authentication</h1>\n";
			$debug =1 ;
			if($debug ==1)
			{
				echo "<h2>Debug Mode Is on, Server Response was </h2>\n";
				echo "<pre>\n";
				var_dump($output);
				echo "/<pre>\n";
			}
        		include $torootdir.'view/common/col12_1border_10body_end.php';
		        include $torootdir.'view/common/footer.php';
			//session was not found
		}


	}
	else
	{
		//session exists and did not come from form
		if (isset($_COOKIE['jiracloud']) && isset($_COOKIE['username']) )
		{

			$jiracloud = $_COOKIE['jiracloud'];
			$username = $_COOKIE['username'];
			$jirasession = "Not Authenticated";
			$jirasessionname = "Not Authenticated";
			if(isset($_COOKIE['jirasession']))
			{
				$jirasession = $_COOKIE['jirasession'];
			}
			if(isset($_COOKIE['jirasessionname']))
			{
				$jirasessionname = $_COOKIE['jirasessionname'];
			}
			$authenticateArray =array("Jira Cloud Instance"=>$jiracloud, "Username"=>$username,"Jira Cloud Session Cookie Name"=> $jirasessionname,"Jira Cloud Session" => $jirasession);
			
			include $torootdir.'view/common/header_start.php';
	        	# include $torootdir.'view/pageconfig/header_resume.php';
	        	include $torootdir.'view/common/header_end.php';
		        include $torootdir.'view/common/main_menu.php';
        		include $torootdir.'view/common/col12_1border_10body_start.php';
        		print "<h1>Authenticate Status</h1>";

			echo "<h2>Currently Stored Session Credentials</h2>";
			printVerticalInfoTableAssocArray($authenticateArray);
        		include $torootdir.'view/common/col12_1border_10body_end.php';
		        include $torootdir.'view/common/footer.php';
		}
		else 
		{
			// No authentication done

			include $torootdir.'view/common/header_start.php';
	        	# include $torootdir.'view/pageconfig/header_resume.php';
	        	include $torootdir.'view/common/header_end.php';
		        include $torootdir.'view/common/main_menu.php';
        		include $torootdir.'view/common/col12_1border_10body_start.php';
        		print "<h1>Authenticate Status</h1>";

			include $torootdir.'view/authenticate/content/nosession.php';
			echo "<h2>No Currently Stored Session Credentials</h2>";
			include $torootdir.'view/common/content/loginnow.php';
        		include $torootdir.'view/common/col12_1border_10body_end.php';
		        include $torootdir.'view/common/footer.php';
		}			
	}



?> 
