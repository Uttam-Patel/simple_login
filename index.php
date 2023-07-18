<?php 
    require_once('config.php');
    if (!isset($_SESSION["username"])) {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container ">
  <h1>Hello <?php echo $_SESSION['username'];?>, Welcome</h1>
    <a href="logout.php" class="text-center" rel="noopener noreferrer" >
      <button class="btn link">Log Out</button>
    </a>
  </div>
</body>
</html>