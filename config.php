<?php
/*
$dbhost = 'mysql01.service.rug.nl';
$dbuser = 's2033593';
$dbpass = 'he4heeciev';
$dbname = 's2033593';
*/

$dbhost = 'localhost';
$dbuser = 'razzed_dbweb';
$dbpass = 'grethedoornbos';
$dbname = 'razzed_hitjes';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
?>
