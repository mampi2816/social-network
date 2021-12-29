<?php

    require 'core.php';
    require 'connect.php';

    if(loggedin()){
        $firstname = getuserfield('firstname', $mysql_connect);
        $surname = getuserfield('surname', $mysql_connect);

        echo 'You\'re logged in, '.$firstname.' '.$surname;
        echo '.<br>Now you can <a href="homepage.php">Post</a> your suggestion.<br>';
        
    }else{
        include 'login.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
    <title>Document</title>
    <style type="text/css">
        body {background-color:lawngreen;}
    </style>
</head>
<body link="blue" style="text-align:left">
    <br><br><br><a href = "logout.php" style="text-decoration:none;">Logout</a>
</body>
</html>
