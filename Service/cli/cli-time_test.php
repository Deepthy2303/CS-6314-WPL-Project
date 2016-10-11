<?php
// create_user.php

//test UserHandler's create_user and exist functions 
require_once "../db_access/UserHandler.php";

$user = new UserHandler();

//get a user lastlogin ttim

$ret = $user->exist('henry@ford.com', 'Password1', null, null);

//print_r($ret);
echo $ret['lastlogin'];
echo PHP_EOL;
// Change the line below to your timezone!
date_default_timezone_set('America/Chicago');
$date = date('m/d/Y h:i:s a', time());
echo $date;
