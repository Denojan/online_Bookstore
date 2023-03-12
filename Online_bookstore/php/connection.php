<?php

$username = 'root';
$password = '';
$db_name = 'about_us';
$hosturl = 'localhost';
$port = '3306';

$connection = new mysqli($hosturl, $username, $password, $db_name, $port);
if ($connection->connect_error) {
    echo 'Error';
}
