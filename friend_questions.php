<?php
session_start();
$uid = $_SESSION['uid3'];
$_SESSION['uid4'] = $uid;

echo "<style> body {
  background: linear-gradient(45deg,#22c1c3 50%, #fdbb2d 50%);
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
    font-size: 50px;
    text-align: center;
    margin-top: 50px;
    align-content: center;
     border-radius: 15px 50px;
    background: wheat;
    padding: 20px; 
    }
    </style>
Friends Responses</h1><br><br>";

$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$_SESSION['name'] = $name;

	$sql="SELECT  qid,ques,A,B,C,D from questions where qid IN (SELECT qid from answers where uid='$uid')";
 
	if(!$result=mysqli_query($con, $sql))
	{
		echo"can't execute querry";
	}
  	   	 echo "<form method='GET' action='friend_score.php'>";
    $x = 0;
  	while ($row=mysqli_fetch_array($result)) 
  	{ 
         $x=$x+1;
  		 $A='A';
  		 $B='B';
  		 $C='C';
  		 $D='D';
  		 $rqid=$row['qid'];
  		 echo" <p>
                    <style>
             p{
              font-size: 35px;
              right: 0;
              padding: 5px 5px;
              color: #888;
              color: black;
            }
            </style>
         {$x}:  {$row['ques']} </p><br>";
  		 echo "<font size=5px>A. <input type='checkbox' name='valA[]' value='".$rqid."'></font>";
  		 echo" <font size=5px>{$row['A']} </font><br><br>";
  		 echo " <font size=5px> B. <input type='checkbox' name='valB[]' value='".$rqid."'></font>";
  		 echo" <font size=5px> {$row['B']} </font><br><br>";
  		 echo "<font size=5px> C. <input type='checkbox' name='valC[]' value='".$rqid."'> </font>";
  		 echo" <font size=5px> {$row['C']} </font><br><br>";
  		 echo "<font size=5px> D. <input type='checkbox' name='valD[]' value='".$rqid."'> </font>";
  		 echo" <font size=5px>{$row['D']} </font><br><br>";	 
  	}
    
  		 echo '<br><input type="submit" style = "width: 100px; height: 50px; margin-left: 20px;" name="submitquiz" value="submitquiz">'.'<br>';
  		 echo"</form>";
 }
  mysqli_close($con);

?>