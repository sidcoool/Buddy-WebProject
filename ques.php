
<?php
echo"questionare<br><br>";
$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="select qid,ques,A,B,C,D from questions";
$uid=4;

if(!$result=mysqli_query($con, $sql))
{
	echo"can't execute querry";
}
  	   	 echo '<form method="GET">';
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
  	$A='A';
	$B='B';
	$C='C';
	$D='D';


  	if(isset($_GET['submitquiz']))
	{
		
	  echo"form submiited successfully !!";
	  $opta=$_GET['valA'];
	  $optb=$_GET['valB'];
	  $optc=$_GET['valC'];
	  $optd=$_GET['valD'];
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
  mysqli_close($con);
  
  $myfile = fopen("NEW{$uid}.php", "w") or die("Unable to open file!");
  $txt = "<html>
  <body>
  HELLO WORLD
  </body>
  </html>";
fwrite($myfile, $txt);
fclose($myfile);
?>
?>