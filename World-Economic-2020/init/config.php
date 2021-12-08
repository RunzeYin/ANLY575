<?php

// localhost
if ( ($_SERVER['HTTP_HOST'] == 'localhost') || ($_SERVER['HTTP_HOST'] == '127.0.0.1') ) {
	define("ROOT_PATH", '/Applications/MAMP/htdocs/World-Economic-2020/');
	define("PROTOCOL", 'http://');
	define("DOMAIN", 'localhost/');
	define('DB', array(
		'host' => '198.211.108.9',
		'db'   => 'runzeyin_anly575',
		'user' => 'runzeyin_anly575',
		'pass' => 'ANLY575-pass',
		'charset' => 'utf8mb4'
	));
	
} else {
	// public server
	define("ROOT_PATH", '/home/runzeyin/public_html/World-Economic-2020/');
	define("PROTOCOL", 'https://'); // change to https:// if necessary
	define("DOMAIN", 'runzeyin.georgetown.domains/');
	define('DB', array(
		'host' => '198.211.108.9',
		'db'   => 'runzeyin_anly575',
		'user' => 'runzeyin_anly575',
		'pass' => 'ANLY575-pass',
		'charset' => 'utf8mb4'
	));
}

define("ADMIN_EMAIL", 'ry180@georgetown.edu');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("SUBFOLDER", 'World-Economic-2020/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
define ('TABLES', array(
	'User' => 'users',
	'Trade' => 'trade',
	'Unemployment' => 'unemployment',
	'GDP' => 'gdp'
));