<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

        if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
            header("location: index.php");
        }else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM `usrs` WHERE email ='$email'";
                $query = mysqli_query($connection,$sql);
                if ($query) { 
                    $data = mysqli_fetch_array($query);
                    if ($data != null) {
                            if (password_verify($password,$data['password'])) {
                                $_SESSION["email"] = $data['email'];
                                $_SESSION["username"] = $data['uname'];
                                header("location: index.php");
                            }else{
                                $user_error = <<<ERRORMSG
                                
                                <p class="subheading text-center error-text">Wrong email or password</p>
                                
                                ERRORMSG;
                                
                            
                        }
                    }else {
                        echo 'No user found';
                    }
                }
            }
        }


    ?>
    <div class="container">
        <form class="form" action="#" method="post">
            <div class="formField">
            <label class="formLabel" for="email" >Email Address</label>    
            <input class="formInput" type="email" name="email" id="email" placeholder="example@email.com" required>
            </div>
            <div class="formField">
            <label class="formLabel" for="password">Password</label>    
            <input class="formInput" type="password" name="password" id="password" required>
            </div>
            <div class="formField">
            <a href="signup.php" class="subheading text-right" rel="noopener noreferrer" >New User? Sign Up</a>
            </div>
            <div class="formField">
                <input type="submit" value="Log In" class="btn">
            </div>
            <?php 
            if (isset($user_error)) {
                echo $user_error;
            }
            ?>
        </form>
    </div>
</body>
</html>