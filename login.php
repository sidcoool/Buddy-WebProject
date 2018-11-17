<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login-Buddy Finder</title>
  <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
 <body background="back.jpg">
        <img src = "back2.jpg" style="position: fixed; height: 800px; width: 1100px;">
        
        <div id="container">
        <form method="post" action="login.php">
        <?php include('errors.php'); ?>

        <label for="usrname"><h3>USERNAME</h3></label>
        <div class="bar" ><input name="username" class="bar" type="text" placeholder="Enter your Username" ></div><br>


        <label for="psw"><h3>PASSWORD</h3></label>
        <div class="bar" ><input name="password" class="bar" type="password" placeholder="Enter your password"></div><br>

        <button type="submit" id="submit1" name="login_user"><b>LOG IN</b></button><br><br>
        <p>
        Not yet a member? <a href="register.php">Sign up</a>
        </p>
        </form>
        </div>
</body>
</html>