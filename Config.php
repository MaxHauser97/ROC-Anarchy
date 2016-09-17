<?php
	//Change the last part according for your own configuration.
	define("databasehost", "localhost");
	define("databaseuser", "root");
	define("databasepass", "root");
	define("databasename", "rocanarchy");
	define("environment", "dev");
	define("maintenance", 0); //0: No, 1: Yes
	define("usesSSL", true); //Does your site have SSL? (https)
	//An array of browser names wich should be ignored for going to https because their authorities have not yet been updated
	//Accepts: Chrome, Firefox, Internet Explorer, Edge, Opera, Safari and Other
	//Seperate browsers via Comma (,)
	define("ignoreSSLBrowser", "");
?>