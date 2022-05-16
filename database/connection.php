<?php

class Connection {
    function create() {
        $config = require '../config.php';

        $database = $config['database'];

        $servername = $database['servername'];
        $username = $database['username'];
        $password = $database['password'];
        $dbname = $database['dbname'];

        // Create connection
        $connection = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}