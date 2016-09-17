<?php
	$ignoreSSL = false;
	if ($_SERVER['SERVER_NAME'] != "localhost") {
		$browserArray = explode(',', ignoreSSLBrowser);
		foreach ($browserArray as $browser) {
			if (get_browserName($_SERVER['HTTP_USER_AGENT']) == $browser) {
				$ignoreSSL = true;
			}
		}
	}
	
	if (usesSSL && !$ignoreSSL) {
		if ($_SERVER['HTTPS'] != "on" && $_SERVER['SERVER_NAME'] != "localhost") { //Localhost doesn't require authentication, this would cause issues with local setups
			$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			header("Location: $url");
			exit;
		}
	}
	
	function get_browserName ($userAgent) {
		if (strpos($userAgent, "Chrome")) {
			return 'Chrome';
		}
		elseif(strpos($userAgent, "Firefox")) {
			return 'Firefox';
		}
		elseif(strpos($userAgent, "MSIE") || strpos($userAgent, "Trident/7")) {
			return 'Internet Explorer';
		}
		elseif(strpos($userAgent, "Edge")) {
			return 'Edge';
		}
		elseif(strpos($userAgent, "Opera") || strpos($userAgent, "OPR/")) {
			return 'Opera';
		}
		elseif(strpos($userAgent, "Safari")) {
			return 'Safari';
		}
		
		//If we don't know the browser, return 'Other', all other browsers can be blocked if so wished.
		return 'Other';
	}
?>