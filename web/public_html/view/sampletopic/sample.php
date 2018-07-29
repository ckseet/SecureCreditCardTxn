<?php
	//Any Changes to Cookies should be done here
	
	//$toroot points to the locaiton of site(under shared sites)
	$torootdir = __DIR__."/../../";

	include $torootdir.'view/common/header_start.php'; //bootstrap

	//Sample Page Specific css and html files
	include $torootdir.'view/pageConfig/sample_page.php'; //bootstrap

        include $torootdir.'view/common/header_end.php'; //bootstrap 
        include $torootdir.'view/common/main_menu.php'; //Menu

	include $torootdir.'view/common/layouts/bodyfull/bodyfullspan_start.php'; //Page
	include $torootdir.'view/sampletopic/content/sample_content_a.php'; //Content of a page
        include $torootdir.'view/common/layouts/bodyfull/bodyfullspan_end.php'; //Page

        include $torootdir.'view/common/footer.php'; //Ending
?>
