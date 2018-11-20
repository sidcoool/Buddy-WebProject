<?php
session_start();
$name = $_SESSION['name'];
$uid = $_SESSION['uid4'];
echo "<style> body {
  background: linear-gradient(45deg,lightblue 50%, #fff 50%);
  background-size: cover;
  height: 100%;
  overflow: auto;
} </style>";
echo"<h1> <style> h1 { 
     color: black;
    text-decoration-color: none;
    font-family: san-serif;
    text-transform: uppercase;
    font-size: 60px;
    text-align: center;
    margin-top: 50px;
    align-content: center;
    background: #;
    padding: 20px; 
    }
    </style>
<u>Friends Responses</u><br><br></h1>";
$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_GET['submitquiz']))

{
	  	$A='A';
		$B='B';
		$C='C';
		$D='D';
		

	  $opta=$_GET['valA'];
	  $optb=$_GET['valB'];
	  $optc=$_GET['valC'];
	  $optd=$_GET['valD'];
	  if(!empty($opta))
	  {
	      foreach ($opta as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$A','$name');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optb))
	  {
	      foreach ($optb as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$B','$name');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optc))
	  {
	      foreach ($optc as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid','$key', '$C','$name');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optd))
	  {
	      foreach ($optd as $key) 
	      {
	    
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$D','$name');";
			mysqli_query($con,$query);
	      }
	  }
	  
}


$sq = "select qid,ques,A,B,C,D from questions where qid IN (select qid from answers where uid='$uid')";
        if($res = mysqli_query($con,$sq))
        {
        	$x=0;
	        $y=-1;
	        $q=-1;
	        $cnt1=0;
	        $cnt2=0;
            while ($row=mysqli_fetch_array($res)) 
            {
                $y=$y+1;
                $sql2[$y] = "select ans from response where uid='$uid' and qid={$row['qid']} and name='$name'";
                $result2[$y] = mysqli_query($con,$sql2[$y]);
                $q=$q+1;
                $sql3[$q] = "select ans from answers where uid='$uid' and qid={$row['qid']}";
                $result3[$q] = mysqli_query($con,$sql3[$q]);
               
                $row2 = mysqli_fetch_array($result2[$y]);
                $row3 = mysqli_fetch_array($result3[$q]);
                echo "<font size = '6px'>{$row['qid']}:  {$row['ques']}<br></font>";
                if($row2['ans'] == 'A' && $row3['ans'] == 'A' )
                {
                     echo "<B><font color='green'><font size = '5px'> A. {$row['A']} </font></font></B><br></font>";
                     echo "<font size = '5px'> B. {$row['B']}<br></font>";
                     echo " <font size = '5px'> C. {$row['C']}<br> </font>";
                     echo " <font size = '5px'>D. {$row['D']}<br></font>";
                     echo"<font size = '5px'>Yeah!! Your Friend also selected the Answer... </font>";
                     $cnt1++;
                     $cnt2++;
                 }
                else if($row2['ans'] == 'A' && $row3['ans'] != 'A' )
                {
                     echo "<B><font color='red'><font size='5px'>A. {$row['A']} </font></font></B><br>";
                     echo "<font size='5px'>B. {$row['B']}<br></font>";
                     echo "<font size='5px'>C. {$row['C']}<br></font>";
                     echo "<font size='5px'>D. {$row['D']}<br></font>";
                     echo"<font size='5px'>Sorry!! Your friend selected option"."{$row3['ans']} </font>";
                     $cnt2++;
                }
                else if($row2['ans'] == 'B' && $row3['ans'] == 'B' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<B><font size='5px'><font color='green'>B. {$row['B']} </font></font></B><br>";
                     echo "<font size='5px'>C. {$row['C']}<br></font>";
                     echo "<font size='5px'>D. {$row['D']}<br></font>";
                     echo"<font size='5px'>Yeah!! Your friend also selected the same Answer...</font>";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'B' && $row3['ans'] != 'B' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<B><font size='5px'><font color='red'>B. {$row['B']} </font></font></B><br>";
                     echo "<font size='5px'>C. {$row['C']}<br></font>";
                     echo "<font size='5px'>D. {$row['D']}<br></font>";
                     echo"<font size='5px'>Sorry!! Your friend selected option.{$row3['ans']} </font>";
                     
                     $cnt2++;
                }
                else if($row2['ans'] == 'C' && $row3['ans'] == 'C' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<font size='5px'>B. {$row['B']}<br></font>";
                     echo "<B><font size='5px'><font color='green'>C. {$row['C']} </font></font></B><br>";
                     echo "<font size='5px'>D. {$row['D']}<br></font>";
                     echo"<font size='5px'>Yeah!! Your friend also selected the same Answer...</font>";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'C' && $row3['ans'] != 'C' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<font size='5px'>B. {$row['B']}<br></font>";
                     echo "<B><font size='5px'><font color='red'>C. {$row['C']} </font></font></B><br>";
                     echo "<font size='5px'>D. {$row['D']}<br></font>";
                     echo"<font size='5px'>Sorry!! Your friend selected option"."{$row3['ans']}</font>";
                     $cnt2++;
                }
                else if($row2['ans'] == 'D' && $row3['ans'] == 'D' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<font size='5px'>B. {$row['B']}<br></font>";
                     echo "<font size='5px'>C. {$row['C']}<br></font>";
                     echo "<B><font size='5px'><font color='green'>D. {$row['D']} </font></font></B><br>";
                     echo"<font size='5px'>Yeah!! Your Friend also selected the same Answer...</font>";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'D' && $row3['ans'] != 'D' )
                {
                     echo "<font size='5px'>A. {$row['A']}<br></font>";
                     echo "<font size='5px'>B. {$row['B']}<br></font>";
                     echo "<font size='5px'>C. {$row['C']}<br></font>";
                     echo "<B><font size='5px'><font color='red'>D. {$row['D']} </font></font></B><br>";
                     echo"<font size='5px'>Sorry!! Your friend selected option.{$row3['ans']}</font>";
                     $cnt2++;
                }
             echo "<br>_________________________________<br><br><br>";
             
            }
            $percent=($cnt1/$cnt2)*100;
            echo" <font size='5px'>You have selected {$cnt1} answers right from {$cnt2} questions<br></font>";
            echo" <font size='5px'>percentage of right questions {$percent}% </font.";
            $sqlit="INSERT into leader VALUES ('$uid','$cnt1','$percent','$name')";
            mysqli_query($con,$sqlit);
    }

  mysqli_close($con);
?>