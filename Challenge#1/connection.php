<?php
    $host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'dummydb';

    $mysqli = new mysqli($host, $db_username, $db_password, $db_name);

    if($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
        exit();
    }
?>