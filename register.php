<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>signup-buddy finder</title>
  <link rel="stylesheet" type="text/css" href="styleregister.css">
</head>


<body background="back.jpg">
    
        <b><p style="font-size: 50px; position: fixed; left: 450px; color: white; top:12px;">SIGN UP</p></b>
        <div id="container" name = "cont">
        <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        
        <div class="bar" ><input type="text" name="name" class="bar" placeholder="Enter your Name" ></div><br>    
        
        <div class="bar" ><input type="text" name="username" value="<?php echo $username; ?>" class="bar" placeholder="Enter your username" pattern="^(?=.{3,15}$)[a-zA-Z0-9/_]+$" title = "Must be atleast 3 charater long and can contain alphabets and numbers and underscore only" required></div><br>
        
        <div class="bar" ><input name="password_1" class="bar" type="password" placeholder="Enter your password" title="Must contain 8 to 15 characters, with atleast 1 lower case alphabet,1 upper case alphabet, 1 number" pattern="^(?=.{8,15}$)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$" required></div><br>
            
            
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
