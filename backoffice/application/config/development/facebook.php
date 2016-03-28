<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	$config['appId']      = '428431784001522';
	$config['secret']     = '1572b5947eaf35b6a2b86bd0c06982d5';

	$config['RECEIVERFB'] = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';
	$config['RECEIVERTW'] = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';
	$config['URLPESTANA'] = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';
	$config['URLAPP']     = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/'; 

	$config['URLIMAGEFB'] = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';

	if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ){
		$config['BASEURL'] = 'https://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';
	}else{
		$config['BASEURL'] = 'http://dev-campanas.digitaria.cl/php5.3/banmedica/colaciones/';
	} 

?>