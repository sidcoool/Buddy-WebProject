<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $name = $_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'buddys');
  $sql = "select id from users where username= '$name'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $uid=$row['id'];
$_SESSION['uid1'] = $uid;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
<title>Homepage|BUDDY</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<script type="text/javascript" href = ""></script>
</head>
<body>
   <div class="container-fluid">
    <header>
        
     <div class ="row">
     <div class="logo container container-fluid">
         <img src="img1.jpg">
     </div>
     
 <ul class="main-nav">
         <li class="active">
        <a href="index.php">BUDDY </a>
          </li>
      <li>
       <a href="#">About Us </a>
       </li>
        <li>
        <a href="#">Contact Us </a>
        </li>
         <li>
        <a href="#">Profile </a>
        </li>
        <button class="btn">
       <a href="index.php?logout='1'">LOGOUT</a>
        </button>
  </ul> 
</div>        
        <?php  if (isset($_SESSION['username'])) : ?>
    	<font color="white" size="5px"><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p></font>
    	
    <?php endif ?>
            
 <div class="hero">
     <h1 id="h">Are You Ready?</h1>
     <div class="button">
         <a href="ques.php" class="btn btn-one">Create Quesnaire</a>
         <a href="leaderboard.php" class="btn btn-two"> Leaderboard </a>
     </div>
 </div>
  </header>
    <section class="cover">
  <div class="content">
    <h2 class="heading">We are here<br />for all your need.</h2>
    <div class="cta-btn">
    <a href="#">Create Your Personal Quiz Now!</a>
    </div>
    <div class="card">
      <h2>Friendship</h2>
      <p> Friends are our Second Family. <br> One of the most beautiful qualities of true friendship is to understand and to be understood.</p>
    </div>
  </div>
</section>
<section class="cover1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="bg_img"></div>
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
        <h2><b>Contact Us </b></h2>
    </div>
    <form method="POST" action="contact_us.php">
      <div class="row clearfix">
        <div class="col_half">
          <label>First name</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="first_name" placeholder="First Name" required />
          </div>
        </div>
        <div class="col_half">
          <label>Last name</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
            <input type="text" name="last_name" placeholder="Last Name" />
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col_half">
          <label>Email</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="example@gmail.com" required />
          </div>
        </div>
        <div class="col_half">
          <label>Phone</label>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
            <input type="tel" name="phone" placeholder="Phone no" pattern="[0-9]{10}" />
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div>
          <label>Comments</label>
          <div class="textarea_field"> <span><i aria-hidden="true" class="fa fa-comment"></i></span>
            <textarea cols="46" rows="3" name="comments"></textarea>
          </div>
        </div>
      </div>
        <center><input class="button1" type="submit" value="Sumbit" name="submit"/> </center>
    </form>
  </div>
</div>
</section>
 <footer id="lab_social_icon_footer">
<div class="container-fluid navbar-fixed-bottom" id="contact-bar">
       <div class="copyright">
    <p>&copy 2018 - Team Buddy</p>
  </div>
        <div class="text-center center-block">
                <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
    </div>
</div>
</footer></div>
</body>
  </html>       