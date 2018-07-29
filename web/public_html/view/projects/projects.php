<?php
			if(!(isset($_COOKIE['jiracloud']) && isset($_COOKIE['jirasession']) && isset($_COOKIE['username']) && isset($_COOKIE['jirasessionname'])   ))
			{
				header("Location: /portfolio/atlassianviewer/view/forms/form_auth.php?form_target=/portfolio/atlassianviewer/view/authenticate/status.php");
				exit();
			}
			$torootdir = __DIR__."/../../";
                        include $torootdir.'controller/connections.php';
                        include $torootdir.'controller/tables.php';
                        include $torootdir.'view/common/header_start.php';
                        # include $torootdir.'view/pageconfig/header_resume.php';
                        include $torootdir.'view/common/header_end.php';
                        include $torootdir.'view/common/main_menu.php';
                        include $torootdir.'view/common/col12_1border_10body_start.php';

			echo "<h1>Projects</h1>\n";
			echo "<p>URL : /rest/api/2/project</p>\n";
			echo "<p>Documentation : <a href=\"https://developer.atlassian.com/cloud/jira/platform/rest/#api-api-2-project-get\"> https://developer.atlassian.com/cloud/jira/platform/rest/#api-api-2-project-get</a></p>\n";
			$responseBody = getProjects($_COOKIE['jiracloud'], $_COOKIE['jirasessionname'], $_COOKIE['jirasession']);
			//echo "<pre>\n";
			//var_dump($responseBody);
			//echo "</pre>\n";

			$valueArray= array();
			foreach($responseBody as $project)
			{

			//	echo "Name : ".$project['name']." Project Type : ".$project['projectTypeKey']." Key:".$project['key']."<br />\n";
					$projectArray = array("Id"=>$project['id'], "Name"=>$project['name'],"Project Type"=>$project['projectTypeKey'],"Key"=>$project['key'],"JIRA Link"=>"<a href=\"https://".$_COOKIE['jiracloud']."/projects/".$project['key']."/issues\">Go To JIRA</a>"); 
					array_push($valueArray,$projectArray);
			}
			printTable2dNumericArrayAssocArray($valueArray);
                        include $torootdir.'view/common/col12_1border_10body_end.php';
                        include $torootdir.'view/common/footer.php';

?>
