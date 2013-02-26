<?php
function emptyString($str) {
	if (!is_string($str)) return false;
	if (empty($str)) return false;
	if ($str == '') return false;
	return true;
}
/**
 * 
 * Redirect URL
 * @param string $link 相对路径
 */
function redirect($link) {
	if(!empty($link)) {
		//echo "$link</br>";
		header("location: $link");
	}
}
/**
 * 
 * Genarate the separational pages
 * @param number $currentPage
 * @param number $totalPage
 */
function getPage($currentPage, $totalPage) {
	if($totalPage > 0) {
		$pageContent = "";
		if($currentPage==1) {
			$pageContent .= "<span>Prev</span>\n";
		} else {
			$pageContent .= "<span><a href=\"?page=".($currentPage-1)."\" title=\"Prev page\">Prev</a></span>\n";
		}
		for($i=1; $i<=$totalPage; $i++) {
			if($i==$currentPage) {
				$pageContent .= "<span class=\"current_page\"><a href=\"?page=$i\" title=\"$i\">$i</a></span>\n";
			} else {
				$pageContent .= "<span><a href=\"?page=$i\" title=\"$i\">$i</a></span>\n";
			}
		}
		if($currentPage==$totalPage) {
			$pageContent .= "<span>Next</span>";
		} else {
			$pageContent .= "<span><a href=\"?page=".($currentPage+1)."\" title=\"Next page\">Next</a></span>";
		}
		
		return $pageContent;
	}
}
function getUserIp() {
	if(getenv('HTTP_CLIENT_IP')) {
		$client_ip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR')) {
		$client_ip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR')) {
		$client_ip = getenv('REMOTE_ADDR');
	} else {
		$client_ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
	}
	return $client_ip;
}
?>