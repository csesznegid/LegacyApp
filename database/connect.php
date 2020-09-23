<?php

require_once(dirname(__FILE__) . "/setup.php");

global $settings;
$db = mysql_connect($settings->host, $settings->user, $settings->password) or die("Could not connect: " . mysql_error());
mysql_select_db($settings->database, $db) or die("Could not select database.");
