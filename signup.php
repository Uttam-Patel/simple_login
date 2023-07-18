
<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
    
        if ($cpassword == $password) {
            $pass_hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `usrs` (`email`, `uname`, `password`) VALUES ('$email', '$username', '$pass_hash')";
            $result = mysqli_query($connection,$sql);
            echo var_dump($result);
            echo "hello";
            if ($result) {
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
    
                if (isset($_SESSION["username"])) {
                    echo "Session Variable Set <br>";
                    header("location: index.php");
                }
                else{
                    echo "Session Variable not Set";
                }
            } else{
                echo "QUERY_ERROR". mysqli_error($connection);
            }
        }
    }
    ?>
    <div class="container">
        <form class="form" action="signup.php" method="post">
            <div class="formField">
            <label class="formLabel" for="username" >User Name</label>
            <input class="formInput" type="text" name="username" id="username" required>
            </div>
            <div class="formField">
            <label class="formLabel" for="email" >Email Address</label>    
            <input class="formInput" type="email" name="email" id="email" placeholder="example@email.com" required>
            </div>
            <div class="formField">
            <label class="formLabel" for="password" >Password</label>    
            <input class="formInput" type="password" name="password" id="password" required>
            </div>
            <div class="formField">
            <label class="formLabel" for="cpassword" >Confirm Password</label>
            <input class="formInput" type="text" name="cpassword" id="cpassword" required>
            </div>
            <div class="formField">
            <a href="login.php" class="subheading text-center" rel="noopener noreferrer" >Already User? Log In</a>
            </div>
            <div class="formField">
                <input type="submit" value="Sign Up" class="btn">
            </div>
        </form>
    </div>
</body>
</html>