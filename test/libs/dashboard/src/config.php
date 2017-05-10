<?php
$dbhost	= 'localhost';
$dbuser	= 'root';
$dbpass	= '';
$dbname	= 'dbtest';
$dbconn	= mysql_connect($dbhost,$dbuser,$dbpass);
$dbopen	= mysql_select_db($dbname,$dbconn);
?>
