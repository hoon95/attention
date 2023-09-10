<?php

    $hostname = 'localhost';
    $dbuserid = 'hoon95';
    $dbpasswd = 'mafakkeo55!';
    $dbname = 'hoon95';

    $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

    if ($mysqli->connect_errno) {
    die('mysqli connection error: ' . $mysqli->connect_error);
    } 

?>