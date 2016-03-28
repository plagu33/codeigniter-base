<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	$config['appId']      = '';
	$config['secret']     = '';

	$config['RECEIVERFB'] = '';
	$config['RECEIVERTW'] = '';
	$config['URLPESTANA'] = '';
	$config['URLAPP']     = '';

	$config['URLIMAGEFB'] = '';

	if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ){
		$config['BASEURL'] = '';
	}else{
		$config['BASEURL'] = '';
	}

?>