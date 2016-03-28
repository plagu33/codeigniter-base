<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* METADATA */
define('TITLE','Virutex - ');
define('DESCRIPTION','');

define('TWITTER_CARD','');
define('TWITTER_SITE','');
define('TWITTER_TITLE','');
define('TWITTER_DESCRIPTION','');
define('TWITTER_CREATOR','');
define('TWITTER_IMAGE',''); //Twitter Summary card images must be at least 120x120px

define('FACEBOOK_TITLE','Easy gym');
define('FACEBOOK_TYPE','article');
define('FACEBOOK_URL','https://dev-campanas.digitaria.cl/virutex/easy-gym/');
define('FACEBOOK_IMAGE','https://dev-campanas.digitaria.cl/virutex/easy-gym/images/facebook/1200x630_2.jpg'); //url to image
define('FACEBOOK_DESCRIPTION','En el Easy Gym de Virutex, te ejercitas mientras limpias tu casa. Elige al profesor que quieras, grábate haciendo ejercicio y participa. Por 1 de las 15 cuentas de Spotify Premium más un pack Easy Clean.');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */