<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>signup-buddy finder</title>
  <link rel="stylesheet" type="text/css" href="styleregister.css">
</head>


<body background="back.jpg">
        <img src = "back2.jpg" style="position: fixed; height: 800px; width: 1100px;">
        <b><p style="font-size: 50px; position: fixed; left: 750px; color: white; top:12px;">SIGN UP</p></b>
        <div id="container" name = "cont">
        <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        
        <div class="bar" ><input type="text" name="name" class="bar" placeholder="Enter your Name" ></div><br>    
        
        <div class="bar" ><input type="text" name="username" value="<?php echo $username; ?>" class="bar" placeholder="Enter your username" ></div><br>
        
        <div class="bar" ><input name="password_1" class="bar" type="password" placeholder="Enter your password" ></div><br>
            
            
        <div class="bar" ><input name="password_2" class="bar" type="password" placeholder="Renter your password"required></div><br>
            
        <div name="bar" ><input name="dob" class="bar" type="date" placeholder="Enter your date of birth" ></div><br>

        <button type="submit" name="reg_user" id="submit2">SIGN UP</button>
        <br>
        <br>
        <p>
        Already a member? <a href="login.php">Sign in</a>
        </p>
        </form>
        </div>
</body>
</html>