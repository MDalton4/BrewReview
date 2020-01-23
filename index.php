<?php
ini_set('display_errors', 'on');
if(!isset($_SESSION)) session_start();

require "vendor/autoload.php";
require "database/generated-conf/config.php";
require "sessionAuth.php";

$page = "feed";

if(SessionAuth::isValid()) {
	include "feed.php";
}
else {
	include "loginForm.php";
}
include "template.php";

?>
