<?php
$hostname = 'localhost';
$dbuserid = 'coderabbit';
$password = 'rabbit9595!!';
$dbname = 'coderabbit';

$mysqli = new mysqli($hostname, $dbuserid, $password, $dbname);

if($mysqli ->connect_errno){
  die('mysqli connection error: '.$mysqli ->connect_error);
}

?>