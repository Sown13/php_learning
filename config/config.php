<?php
    $SERVER_NAME = "localhost";
    $DB_NAME = "php_learning";
    $DB_USER = "root";
    $DB_PASSWORD = "admin";

    $connection = new mysqli($SERVER_NAME, $DB_USER, $DB_PASSWORD,$DB_NAME);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    echo "Connection successfull. <br/>";
?>