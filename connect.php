<?php

    // Different in webhost

    $conn_error = 'Could not connect.';

    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_pass = '';
    $mysql_db = 'social-network';

    if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db)){
        die($conn_error);
    }

    $mysql_connect = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

?>

