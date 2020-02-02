<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
function insertUrlParams($string) {
	$acceptedParams = ['track1', 'track2'];
	$url = explode('?', $string);
	$urlParams = explode('&', $url[0]);
	$urlParamX = array();
	$urlParamXString = array();
	foreach($urlParams as $k => $v){
		$parts = explode('=', $v);
		if (isset($parts[1])) {
			$urlParamX[$parts[0]] = $parts[1];
		}
	}
	foreach($_GET as $k => $v) {
		if (in_array($k, $acceptedParams)) {
			$urlParamX[$k] = $v;
		}
	}
	foreach($urlParamX as $k => $v) {
		$urlParamXString[] = $k . '=' . $v;
	}
	return $url[0] . '?' . implode('&', $urlParamXString);
}
	$links = array(
	"default" 	=> "http://www.julienguiss.com",
	"link1"     => "http://www.julienguiss.com",
	"link2"     => "http://www.julienguiss.com",
	"link3"     => "http://www.julienguiss.com"
);
	$url = $links['default'];
	$id = explode('?', substr($_SERVER['REQUEST_URI'], 1));
	$id = $id[0];

	if (isset($links[$id])) {
	$url = $links[$id];
}
header( "X-Robots-Tag: noindex, nofollow", true );
header( "Location: " .  insertUrlParams($url), 302 );
die();
