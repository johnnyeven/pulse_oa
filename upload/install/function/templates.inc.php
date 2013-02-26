<?php

function readFromFile($fileName) {
	$fileContent = @file_get_contents($fileName);
	return $fileContent;
}

function getTemplateByName($templateName, $templateExtension = '.html') {
	global $root_path;
	$fileName = $root_path . 'templates/' . $templateName . $templateExtension;
	return readFromFile($fileName);
}

function parseTemplate($templateContent, $array) {
	foreach($array as $key=>$value) {
		$templateContent = str_replace("{%$key%}", $value, $templateContent);
	}
	return $templateContent;
}

?>