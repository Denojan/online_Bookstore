<?php

$username = 'root';
$password = '';
$db_name = 'online_bookstore';
$hosturl = 'localhost';
$port = '3306';

$connection = new mysqli($hosturl, $username, $password, $db_name, $port);
if ($connection->connect_error) {
    echo 'Error';
}
