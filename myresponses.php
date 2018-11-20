<?php 
session_start();
$uid = $_SESSION['varname'];

$myfile = fopen("friend_response{$uid}.php", "w") or die("Unable to open file!");
  $txt = "<html>
  <body>
  HELLO WORLD
  </body>
  </html>";
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
    Copy this link to share <br>
    <a href='friend_response<?php echo $uid ?>.php'>Click Here</a><br>
    Or press the button below to post this Questionaire on Facebook";
<br>
    <div>
<button id="shareBtn" style = "color:white; background-color:blue;" >Share</button></div>
<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'www.google.com',
  }, function(response){});
}
</script>
</body>
</html>
