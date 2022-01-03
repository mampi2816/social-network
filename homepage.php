<?php

    require 'connect.php';
    require 'core.php';

    if(loggedin()){
        if(isset($_POST['title']) && isset($_POST['body'])){

            $title =  mysqli_real_escape_string ($mysql_connect, $_POST['title']);
            $body =  mysqli_real_escape_string ($mysql_connect, $_POST['body']);
            $session = $_SESSION['user_id'];
            
            if(!empty($title) && !empty($body)){
                if(strlen($title)>255 || strlen($body)>1000){
                    echo 'Please ahear to maxlength of fields.';
                }else{
                    $query = "INSERT INTO posts(id, title, body) VALUES('$session', '$title', '$body')";
                    if($query_run=mysqli_query($mysql_connect, $query)){
                        header('Location: post_success.php');
                    }else{
                        echo 'Sorry, we couldn\'t post at this time. Try again Later.';
                    }                    
                }
            }else{    
                echo 'All fields are required.';
            }
        }
    }else{
        echo 'Please log in first.<a href="login.php">Log In</a>';
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
    <h1 style="text-align:center;">Home Page</h1>
     <style type="text/css">
        body {background-color:lawngreen;}
    </style>
</head>
<body>
<a href = "frame1.html" style="text-decoration:none;">1.Frame1</a><br>
<a href = "frame2.html" style="text-decoration:none;">2.Frame2</a><br>
<a href = "frame3.html" style="text-decoration:none;">3.Frame3</a><br>
<a href = "frame4.html" style="text-decoration:none;">4.Frame4</a><br>
<a href = "index2.html" style="text-decoration:none;">5.Swachh Bharat Abhiyan</a><br>
<a href = "index3.html" style="text-decoration:none;">6.Feedback From</a><br>
<a href = "index10.html" style="text-decoration:none;">7.Pattern1</a><br>
<a href = "index11.html" style="text-decoration:none;">8.Pattern2</a><br>
<a href = "index13.html" style="text-decoration:none;">9.Pattern3</a><br><br><br>

<form action="homepage.php" method="POST">
    Title:<br><textarea name="title" id="" cols="10" rows="1" placeholder="Title Number..." maxlength="255"></textarea><br><br>
    Post:<br><textarea name="body" id="" cols="25" rows="10" placeholder="Suggestion..." maxlength="1000"></textarea>
    <input type="file" value="Post"><br><br>
    <input type="submit" value="Post">
</form>
<p align="right"><a href = "logout.php" style="text-decoration:none;">Logout</a></p>
</body>
</html>

