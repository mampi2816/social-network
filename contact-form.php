<?php

require 'connect.php';
require 'core.php';


    if(loggedin()){
        if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text'])){
            $contact_name = $_POST['contact_name'];
            $contact_email = $_POST['contact_email'];
            $contact_text = $_POST['contact_text'];
            
            if(!empty($contact_name) && !empty($contact_email) && !empty($contact_text)){
                if(strlen($contact_name)>25 || strlen($contact_email)>50 && strlen($contact_text)>1000){
                    echo 'Sorry, maxlength for some field has been exceeded.';
                }else{
                    $to = '9204varun@gmail.com';
                    $subject = 'Contact form submitted';
                    $body = $contact_name."\n".$contact_text;
                    $headers = 'form:'.$contact_email;

                    if(@mail($to, $subject, $body, $header)){
                        echo 'Thanks for contacting us. We\'ll be in touch soon.';
                    }else{
                        echo '<br><br>Sorry, an error occurred. Please try again later.<br>';
                    }
                }
            }
        
        }else{
            echo '<br><br>All fields are required.'; 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method ="POST">
        Name:<br><input type="text" name="contact_name" placeholder="Name..." maxlength="25"><br><br>
        Email address:<br><input type="text" name="contact_email" placeholder="Email..." maxlength="50"><br><br>
        Message:<br>
        <textarea name="contact_text" rows="6" cols="30" placeholder="Enter your message..." maxlength="1000"></textarea><br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
