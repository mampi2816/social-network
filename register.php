<?php

    require 'connect.php';
    require 'core.php';

    if(!loggedin()){

        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['email'])){

            $username =  mysqli_real_escape_string ($mysql_connect, $_POST['username']);
            $password =  mysqli_real_escape_string ($mysql_connect, $_POST['password']);
            $password_again =  mysqli_real_escape_string ($mysql_connect, $_POST['password_again']); //Can have error here.
            $password_hash =  mysqli_real_escape_string ($mysql_connect, md5($password)); 
            
            
            $firstname = $_POST['firstname'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];

            if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname) && !empty($email)){
                if(strlen($username)>30 || strlen($firstname)>40 || strlen($surname)>40){
                    echo 'Please ahear to maxlength of fields.';
                }else{
                    if($password!=$password_again){
                        echo 'Password do not match!';
                    }else{
                        
                        $query = "SELECT `username` FROM `users` WHERE `username`='$username'";
                        $query_run = mysqli_query($mysql_connect, $query);
                        if(!$query_run){
                            echo("Query Failed!");
                            echo("<b>Query Error:</b> ". mysqli_error($mysql_connect));
                        }

                        if(mysqli_num_rows($query_run)==1){
                            echo 'The username '.$username.' already exists.';
                        }else{
                            $query = "INSERT INTO users(username, password, firstname, surname, email) VALUES('$username', '$password', '$firstname', '$surname', '$email') ";
                            if($query_run=mysqli_query($mysql_connect, $query)){
                                header('Location: registration_success.php');
                            }else{
                                echo(mysqli_error($mysql_connect));
                                echo 'Sorry, we couldn\'t register you at this time. Try again Later.';
                            }
                        }

                    }
                }
            }else{
            echo 'All fields are required.';
            }
        }
    }else{
    echo 'You\'ve already registered and logged in.';
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
</head>
<body style="background-color:lawngreen">
<h1 style="text-align:center;">Registration Page</h1>
<form action="register.php" method="POST">
Username:<br><input type="text" placeholder="Username..." name="username" value="<?php if(isset($username)) echo $username; ?>"><br><br>
Password:<br><input type="password" placeholder="Password..." name="password" ><br><br>
Confirm Password:<br><input type="password" placeholder="Confirm Password..." name="password_again" ><br><br>
Firstname:<br><input type="text" placeholder="Firstname..." name="firstname" value="<?php if(isset($firstname)) echo $firstname; ?>"><br><br>
Surname:<br><input type="text" placeholder="Surname..." name="surname" value="<?php if(isset($surname)) echo $surname; ?>"><br><br>
Email:<br><input type="text" placeholder="Email..." name="email" value="<?php if(isset($email)) echo $email; ?>"><br><br>
<input type="submit" value="Register">
</form>
    
</body>
</html>

