<?php

require_once(dirname(__FILE__) . "/setup.php");

global $settings;
$db = mysqli_connect($settings->host, $settings->user, $settings->password) or die("Could not connect: " . mysqli_error($db));
mysqli_select_db($db, $settings->database) or die("Could not select database.");
