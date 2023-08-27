<?php
$hostname = 'localhost';
$dbuserid = 'class';
$password = '1111';
$dbname = 'class';

$mysqli = new mysqli($hostname, $dbuserid, $password, $dbname);

if($mysqli ->connect_errno){
  die('mysqli connection error: '.$mysqli ->connect_error);
}

?>