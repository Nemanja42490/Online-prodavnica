<?php
/* ################################################# */
define ("DB","my_store");
define ("DBHOST","localhost");
define ("DBUSER","root");
define ("DBPASS","mysql");
/* ################################################# */
define ("APP_DIR","D:/ampps/www/my_store/");
/* ################################################# */
function __autoload($class){
	require_once APP_DIR . "classes/" . $class.".php";
}
/* ################################################# */