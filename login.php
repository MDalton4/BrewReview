<?php
session_start();

require "vendor/autoload.php";
require "database/generated-conf/config.php";
require "sessionAuth.php";

$user = UserQuery::create()->findPk($_POST['username']);

if(!isset($_POST['username'], $_POST['password'])) {
    echo "ERROR: Malformed form data.";
}
else if(empty($user)) {
    echo "ERROR: Username does not exist.";
}
else if(!password_verify($_POST['password'], $user->getPassword())) {
    echo "ERROR: Incorrect password.";
}
else {
    SessionAuth::initSession($_POST['username'], $user->getPermissions());
    require "feed.php";
    echo $content;
}

?>