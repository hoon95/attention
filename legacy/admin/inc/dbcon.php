<?php

    $hostname = 'localhost';
    $dbuserid = 'coderabbit';
    $dbpasswd = 'rabbit9595!!';
    $dbname = 'coderabbit';

    $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

    if ($mysqli->connect_errno) {
    die('mysqli connection error: ' . $mysqli->connect_error);
    } 

?>