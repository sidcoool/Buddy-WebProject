<?php   
session_start();
echo" <style> body {
  background: linear-gradient(45deg,#0677a1 50%, #78244c 50%);
  background-size: cover;
  height: 100%;
  overflow: auto;
} </style>";
echo"
<h1> <style> h1 { color: white;
    text-decoration-color: white
    font-family: san-serif;
    text-transform: uppercase;
    font-size: 70px;
    text-align: center;
    margin-top: 50px;
    align-content: center;
    border: 2px solid black;
    }
    </style>
    Questionare 
</h1> <br>";
$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="select qid,ques,A,B,C,D from questions";
$uid=5;
$_SESSION['varname'] = $uid;

if(!$result=mysqli_query($con, $sql))
{
	echo"can't execute querry";
}
  	   	 echo '<form method="GET" action="myresponses.php">';
  	while ($row=mysqli_fetch_array($result)) 
  	{
  		 $A='A';
  		 $B='B';
  		 $C='C';
  		 $D='D';
  		 $rqid=$row['qid'];
  		 echo" <p>
         <style>
          p{
              font-size: 40px;
              right: 0;
              padding: 5px 5px;
              color: #888;
              border-radius: 5px;
              cursor: pointer;
              background-color: #1ba94c	;
              color: black;
              z-index: 1;
            }
            </style>
         {$row['qid']}:  {$row['ques']}<br><br> </p>";
  		 echo "<h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
           }
           </style>
         A. <input type='checkbox' name='valA[]' value='".$rqid."'></h4>";
  		 echo"<h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
             margin-top: 5px;
           }
           </style>
         {$row['A']}<br><br></h4>";
        echo"<br>";
  		 echo " <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
           }
           </style>
         B. <input type='checkbox' name='valB[]' value='".$rqid."'> </h4>";
  		 echo" <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
             margin-top: 5px;
           }
           </style>
         {$row['B']}<br><br> </h4>";
        echo"<br>";
  		 echo " <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
           }
           </style>
         C. <input type='checkbox' name='valC[]' value='".$rqid."'></h4>";
  		 echo" <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
             margin-top: 5px;
           }
           </style>
         {$row['C']}<br><br></h4>";
        echo"<br>";
  		 echo "  <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
           }
           </style>
         D. <input type='checkbox' name='valD[]' value='".$rqid."'> </h4>";
  		 echo" <h4>
         <style>
         h4{
             color: black;
              text-decoration-color: white;
              text-transform: uppercase;
             font-size: 20px;
             display: inline-block;
             margin-top: 5px;
           }
           </style>
         {$row['D']}<br><br></h4>";	 
  	}
  		 echo ' <p>
         <style>
          p{
              font-size: 40px;
              right: 0;
              padding: 5px 5px;
              color: #888;
              border-radius: 5px;
              cursor: pointer;
              align: center;
              color: black;
              z-index: 1;
            }
            </style>
         
         <center><input type="submit" name="SUBMIT1" value="SUBMIT"></center><br></p>';
  		 echo "</form>";
  	$A='A';
	$B='B';
	$C='C';
	$D='D';


  	if(isset($_GET['SUBMIT1']))
	{
		
	  echo "form submitted successfully !!";
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

?>