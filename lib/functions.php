<?php
/*****************************************************************************
 * strleft 
*****************************************************************************/
	function strleft($s1, $s2) { 
		return substr($s1, 0, strpos($s1, $s2)); 
	}

	function selfURL() {
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	}

/**********************************************************************************/
	function getUserOS ($useragent) {
		if (ereg('Linux(/| )', $useragent, $os)) {
			$os_type = 'Linux';
		} elseif (ereg('Windows(/| )', $useragent, $os)) {
			$os_type = 'Windows';
		} elseif (ereg('Mac(/| )', $useragent, $os)) {
			$os_type = 'Mac';
		} else {
			$os_type = 'Unknown';
		}
		return $os_type;
	}
/**********************************************************************************/

/**********************************************************************************/

	function getBrowserType ($browserval) {
		$HTTP_USER_AGENT = $browserval; 

		if (ereg('Safari', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'safari'; 
		} 
		elseif (ereg('Opera(/| )([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[2]; 
		   $browser_agent = 'opera'; 
		} 
		else if (ereg('MSIE ([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'ie'; 
		} 
		else if (ereg('OmniWeb/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'omniweb'; 
		} 
		else if (ereg('Netscape([0-9]{1})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'netscape';
		} 
		else if (ereg('Mozilla/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'mozilla'; 
		} 
		else if (ereg('Konqueror/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) 
		{ 
		   $browser_version = $log_version[1]; 
		   $browser_agent = 'konqueror'; 
		} 
		else 
		{ 
		   $browser_version = 0; 
		   $browser_agent = 'other'; 
		}
		return $browser_agent;
	}

/**********************************************************************************/
	function getPageFromUri($uri) {
		$fields = explode('/', $uri);
		$page = $fields[count($fields) - 1];
		return $page;
	}
/**********************************************************************************/

	function paginate($start,$limit,$total,$filePath,$otherParams) {
		global $lang;
	
		$allPages = ceil($total/$limit);
	
		$currentPage = floor($start/$limit) + 1;
	
		$pagination = "";
		if ($allPages>10) {
			$maxPages = ($allPages>9) ? 9 : $allPages;
	
			if ($allPages>9) {
				if ($currentPage>=1&&$currentPage<=$allPages) {
					$pagination .= ($currentPage>4) ? " ... " : " ";
	
					$minPages = ($currentPage>4) ? $currentPage : 5;
					$maxPages = ($currentPage<$allPages-4) ? $currentPage : $allPages - 4;
	
					for($i=$minPages-4; $i<$maxPages+5; $i++) {
						$pagination .= ($i == $currentPage) ? "<a href=\"#\" 
						class=\"current\">".$i."</a> " : "<a href=\"".$filePath."?
						start=".(($i-1)*$limit).$otherParams."\">".$i."</a> ";
					}
					$pagination .= ($currentPage<$allPages-4) ? " ... " : " ";
				} else {
					$pagination .= " ... ";
				}
			}
		} else {
			for($i=1; $i<$allPages+1; $i++) {
			$pagination .= ($i==$currentPage) ? "<a href=\"#\" class=\"current\">".$i."</a> "
			: "<a href=\"".$filePath."?start=".(($i-1)*$limit).$otherParams."\">".$i."</a> ";
			}
		}
	
		if ($currentPage>1) $pagination = "<a href=\"".$filePath."?
		start=0".$otherParams."\">FIRST</a> <a href=\"".$filePath."?
		start=".(($currentPage-2)*$limit).$otherParams."\"><</a> ".$pagination;
		if ($currentPage<$allPages) $pagination .= "<a href=\"".$filePath."?
		start=".($currentPage*$limit).$otherParams."\">></a> <a href=\"".$filePath."?
		start=".(($allPages-1)*$limit).$otherParams."\">LAST</a>";
	
		echo '<div class="pages">' . $pagination . '</div>';
	}

?>
