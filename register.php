<?php
session_start();

require "vendor/autoload.php";
require "database/generated-conf/config.php";
require "sessionAuth.php";

if(!isset($_POST['name'], $_POST['username'], $_POST['password'], $_POST['confirmPassword'])) {
    echo "ERROR: Malformed form data.";
}
else if(!preg_match('/^[\w-]+$/', $_POST['username'])) {
    echo "ERROR: Usernames must be alphanumeric.";
}
else if($_POST['password'] !== $_POST['confirmPassword']) {
    echo "ERROR: Passwords do not match.";
}
else if(strlen($_POST['username']) > 24) {
    echo "ERROR: Username longer than 24 characters.";
}
else if(!empty(UserQuery::create()->findPk($_POST['username']))) {
    echo "ERROR: Username already in use.";
}
else {
    $user = new User();
    $now = new DateTime();
    $user
        ->setRealName($_POST['name'])
        ->setUsername($_POST['username'])
        ->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT))
        ->setCreationtime($now)
        ->setLastactivitytime($now)
        ->setPermissions(0)
        ->save();
    SessionAuth::initSession($_POST['username'], 0);
    require "feed.php";
    echo $content;
}


?>