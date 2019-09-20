<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "Tp_DesarrolloWeb";

    // Create connection
    $connection = mysqli_connect($host, $user, $pass, $db);
    mysqli_set_charset($connection, "utf8");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully \n";

?>