<?php 
session_start();
$uid = $_SESSION['uid2'];

$myfile = fopen("friend_response{$uid}.php", "w") or die("Unable to open file!");
  $txt = "
  <?php 
  session_start();
  \$_SESSION['uid3'] = {$uid};
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

";
      
fwrite($myfile, $txt);
fclose($myfile);

echo "<style> body {
  background: linear-gradient(45deg,#0677a1 50%, #78244c 50%);
  background-size: cover;
  height: 100%;
  overflow: auto;
} </style>";
echo"
<h1> <style> h1 { 
     color: black;
    text-decoration-color: none;
    font-family: san-serif;
    text-transform: uppercase;
    font-size: 70px;
    text-align: center;
    margin-top: 50px;
    align-content: center;
     border-radius: 15px 50px;
    background: #73AD21;
    padding: 20px; 
    }
    </style>
    Fielding Questions 
</h1> <br>";
$con = mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  	$A='A';
	$B='B';
	$C='C';
	$D='D';


  	if(isset($_GET['SUBMIT1']))
	{
	  if(isset($_GET['valA'])){$opta=$_GET['valA'];}
	  if(isset($_GET['valB'])){$optb=$_GET['valB'];}
	  if(isset($_GET['valC'])){$optc=$_GET['valC'];}
	  if(isset($_GET['valD'])){$optd=$_GET['valD'];}
	  if(!empty($opta))
	  {
	      foreach ($opta as $key) 
	      {
		    $query = "INSERT INTO answers VALUES('$uid', '$key', '$A');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optb))
	  {
	      foreach ($optb as $key) 
	      {
		    $query = "INSERT INTO answers VALUES('$uid', '$key', '$B');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optc))
	  {
	      foreach ($optc as $key) 
	      {
		    $query = "INSERT INTO answers VALUES('$uid','$key', '$C');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optd))
	  {
	      foreach ($optd as $key) 
	      {    
		    $query = "INSERT INTO answers VALUES('$uid', '$key', '$D');";
			mysqli_query($con,$query);
	      }
	  }
	}
        $sq = "select qid,ques,A,B,C,D from questions where qid IN (select qid from answers where uid='$uid')";

        $x=0;
        $y=-1;
        if($res = mysqli_query($con,$sq))
        {
            while ($row=mysqli_fetch_array($res)) 
            {
                $y=$y+1;
                $sql[$y] = "select ans from answers where uid='$uid' and qid={$row['qid']}";
                $result[$y] = mysqli_query($con,$sql[$y]);
                $x=$x+1;
                echo " <p>
                    <style>
             p{
              font-size: 40px;
              right: 0;
              padding: 5px 5px;
              color: #888;
              border-radius: 5px;
              cursor: pointer;
              background-color: #E7717D	;
              color: black;
              z-index: 2;
            }
            </style>
                {$x}:  {$row['ques']}<br></p>";
                $row2 = mysqli_fetch_array($result[$y]);
                if($row2['ans'] == 'A')
                {
                     echo "<B><font color=#ADFF2F><font size=6px>A. {$row['A']} </font></font></B><br>";
                     echo "<font size=4px>B. {$row['B']}<br></font>";
                     echo " <font size=4px>C. {$row['C']}<br></font>";
                     echo "<font size=4px> D. {$row['D']}<br></font>";
                }
                else if($row2['ans'] == 'B')
                {
                     echo "<font size=4px> A. {$row['A']}<br></font>";
                     echo "<B><font color=#ADFF2F><font size=6px>B. {$row['B']} </font></font></B><br>";
                     echo "<font size=4px> C. {$row['C']}<br><font>";
                     echo "<font size=4px>D. {$row['D']}<br></font>";
                }
                else if($row2['ans'] == 'C')
                {
                     echo "<font size=4px>A. {$row['A']}<br> </font>";
                     echo "<font size=4px>B. {$row['B']}<br> </font>";
                     echo "<font size=6px><B><font color= #ADFF2F>C. {$row['C']} </font> </font></B><br>";
                     echo "<font size=4px>D. {$row['D']}<br> </font>";
                }
                else if($row2['ans'] == 'D')
                {
                     echo "<font size=4px> A. {$row['A']}<br></font>";
                     echo "<font size=4px>B. {$row['B']}<br></font>";
                     echo "<font size=4px>C. {$row['C']}<br></font>";
                     echo "<B><font size=6px><font color=#ADFF2F>D. {$row['D']} </font></font></B><br>";
                }
             echo "_______________________________________________<br><br><br>";
            }
    }
?>
<html>
<body>
    <font size=5px > <font color='red'>Copy this link to share <br>
    <a href='friend_response<?php echo $uid ?>.php'>localhost/Buddy-WebProject/friend_response<?php echo $uid ?>.php</a><br>
        </font></font>
</body>
</html>
