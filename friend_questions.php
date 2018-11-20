<?php

echo"Friends Responses<br><br>";
$con=mysqli_connect("localhost","root","","buddy");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	
	$uid=3;
	$sql="SELECT  qid,ques,A,B,C,D from questions where qid IN (SELECT qid from answers where uid='$uid')";
 
	if(!$result=mysqli_query($con, $sql))
	{
		echo"can't execute querry";
	}
  	   	 echo "<form method='GET' action='friend_score.php'>";
  	while ($row=mysqli_fetch_array($result)) 
  	{
  		 $A='A';
  		 $B='B';
  		 $C='C';
  		 $D='D';
  		 $rqid=$row['qid'];
  		 echo"{$row['qid']}:  {$row['ques']}<br><br>";
  		 echo "A. <input type='checkbox' name='valA[]' value='".$rqid."'>";
  		 echo"{$row['A']}<br><br>";
  		 echo "B. <input type='checkbox' name='valB[]' value='".$rqid."'>";
  		 echo"{$row['B']}<br><br>";
  		 echo "C. <input type='checkbox' name='valC[]' value='".$rqid."'>";
  		 echo"{$row['C']}<br><br>";
  		 echo "D. <input type='checkbox' name='valD[]' value='".$rqid."'>";
  		 echo"{$row['D']}<br><br>";	 
  	}
  		 echo '<input type="submit" name="submitquiz" value="submitquiz">'.'<br>';
  		 echo"</form>";
 }
  echo "end";
  mysqli_close($con);

?>