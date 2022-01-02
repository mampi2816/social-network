<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
    <title>Document</title>
    <h1 style="text-align:center;">Post Confirmation</h1>
    <style type="text/css">
        body {background-color:lawngreen;}
    </style>
</head>
<body>
    
<p align="right"><a href="homepage.php" style="color:red; text-decoration:none;">Home</a></p>
You're post was 
<?php

require 'core.php';
require 'connect.php';

    if(loggedin()){
        $title = getuserfield('title', $mysql_connect);
        $body = getuserfield('body', $mysql_connect);

        echo 'You\'re logged in, '.$title.' '.$body;
    }

?>successfully posted.
    
</body>
</html>
