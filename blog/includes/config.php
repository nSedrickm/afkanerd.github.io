<?php
ob_start();
session_start();

//database credentials
define('DBHOST','127.0.0.1:8889');
define('DBUSER','database username');
define('DBPASS','database password');
define('DBNAME','database name');

#$db = new PDO("mysql:host=".DBHOST.";port=;dbname=".DBNAME, DBUSER, DBPASS);
$db = new PDO("mysql:host=".DBHOST.";port=;dbname=".DBNAME, DBUSER, DBPASS);
$db -> setAttribute(PD0::ATTR_ERRMODE, PD0::ERRMODE_EXCEPTION);

//set timezone
date_default_timezone_set('Africa/Yaounde');

//autoload function
function __autoload($class) {
  $class = strtolower($class);
  $classpath = 'classes/class.'.$class . '.php';

  if (file_exists($classpath)) {
    require_once $classpath;
  }

  $classpath = '../classes/class.'.$class . '.php';
  if (file_exists($classpath)) {
    require_once $classpath;
  }

}

$user = new User($db);

?>
