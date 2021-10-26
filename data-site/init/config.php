
<?php
define("ROOT_PATH", '/home/runzeyin/public_html/data-site/');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("PROTOCOL", 'http://');
define("DOMAIN", 'runzeyin.georgetown.domains/');
define("SUBFOLDER", 'data-site/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
const TABLES = array(
	'User' => 'users',
	'Assignment' => 'assignments',
	'Submission' => 'submissions',
	'Course' => 'courses'
);
const DB = array(
	'host' => '198.211.108.9',
	'db'   => 'runzeyin_anly575',
	'user' => 'runzeyin_anly575',
	'pass' => 'ANLY575-pass',
	'charset' => 'utf8mb4'
);