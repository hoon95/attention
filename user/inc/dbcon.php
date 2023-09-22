<?php

    $hostname = 'localhost';
    $dbuserid = 'gie0225';
    $dbpasswd = 'gie5300as!';
    $dbname = 'gie0225';

    $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

    if ($mysqli->connect_errno) {
    die('mysqli connection error: ' . $mysqli->connect_error);
    } 

?>