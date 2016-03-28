<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	$config['appId']      = '962502283798915';
	$config['secret']     = 'd0f615343c500e15f1346d55f2a786d5';

	$config['RECEIVERFB'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';
	$config['RECEIVERTW'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';
	$config['URLPESTANA'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';
	$config['URLAPP']     = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/'; 

	$config['URLIMAGEFB'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';

	if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ){
		$config['BASEURL'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';
	}else{
		$config['BASEURL'] = 'https://dev-campanas.digitaria.cl/virutex/easy-gym/';
	} 

?>