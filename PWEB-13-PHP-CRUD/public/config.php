<?php
    $server = "php-database"; //Change On Docker php-database, Local 0.0.0.0
    $user = "user";
    $password = "password";
    $database = "phpdatabase";
    $port = "3306"; //Change On Docker 3306, Local 8081
    $db = mysqli_connect($server, $user, $password, $database, $port);

    if(!$db)
    {
        die("Error when connecting to database!".mysqli_connect_error());
    }
?>