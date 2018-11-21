
  <?php 
  session_start();
  $_SESSION['uid3'] = 10;
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Friends-Responses</title>
	<style>
        header{
            border-bottom-left-radius: 20px;
             border-bottom-right-radius: 20px;
            height: 100vh;
            background-size: cover;
            background-position: center;
        }
        body{
            background: linear-gradient(45deg,#FF4136
             50%,#fff 50%);
            background-size: cover;
            background-position: center;
        }
        #h{
            color: black;
           text-transform: uppercase;
            font-size: 70px;
            text-align: center;
             margin-top: 100px;
             align-content: center;
             border-style: dashed;
            border: 3px solid black;
            font-family: verdana,sans-serif;
            
          }
        #h1{
            margin-left: 140px;
            font-size: 50px;
            font-family: comic sans MS,fantasy;
            
        }
        .khushal{
            margin-left: 200px;
            font-size: 34px;
            font-family: comic sans MS,fantasy;
        }
        .shivang{
            width: 200px;
            height: 27px;
        }
        .shivang1{
            background-color: darkblue;
            color: white;
            width: 120px;
            height: 50px;
            text-shadow: 10;
            border-radius: 10px;
            text-align: center;   
            padding: 10px 15px;  
            margin-left: 340px;
        }
    </style>
</head>
<body>

	<h1 id='h'>Welcome to buddy finder</h1><br>
	<h3 id = 'h1'>Please enter your name to continue !!</h3>
	<div class='khushal'>
	<form name='fresponse' method='POST' action='friend_questions.php'>
	Enter your Name: <input class='shivang' type='text' name='name' placeholder='Name' width='80px' height='80px'><br><br>
	<input class='shivang1' type='submit' name='submit' value='Submit'>
	</form> 
    </div>

</body>
</html>

