<?php

echo"Friends Responses<br><br>";
$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_GET['submitquiz']))

{
		$uid=3;
	  	$A='A';
		$B='B';
		$C='C';
		$D='D';
		
	  echo"form submiited successfully !!";
	  $opta=$_GET['valA'];
	  $optb=$_GET['valB'];
	  $optc=$_GET['valC'];
	  $optd=$_GET['valD'];
	  if(!empty($opta))
	  {
	      foreach ($opta as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$A');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optb))
	  {
	      foreach ($optb as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$B');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optc))
	  {
	      foreach ($optc as $key) 
	      {
		    $query = "INSERT INTO response VALUES('$uid','$key', '$C');";
			mysqli_query($con,$query);
	      }
	  }
	  if(!empty($optd))
	  {
	      foreach ($optd as $key) 
	      {
	    
		    $query = "INSERT INTO response VALUES('$uid', '$key', '$D');";
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
                $sql2[$y] = "select ans from response where uid='$uid' and qid={$row['qid']}";
                $result2[$y] = mysqli_query($con,$sql2[$y]);
                $q=$q+1;
                $sql3[$q] = "select ans from answers where uid='$uid' and qid={$row['qid']}";
                $result3[$q] = mysqli_query($con,$sql3[$q]);
               
                $row2 = mysqli_fetch_array($result2[$y]);
                $row3 = mysqli_fetch_array($result3[$q]);
                echo "{$row['qid']}:  {$row['ques']}<br>";
                if($row2['ans'] == 'A' && $row3['ans'] == 'A' )
                {
                     echo "<B><font color='green'>A. {$row['A']} </font></B><br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                     echo"yeah!! your friend also selected the same";
                     $cnt1++;
                     $cnt2++;
                 }
                else if($row2['ans'] == 'A' && $row3['ans'] != 'A' )
                {
                     echo "<B><font color='red'>A. {$row['A']} </font></B><br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                     echo"sorry!! your friend selected option"."{$row3['ans']}";
                     $cnt2++;
                }
                else if($row2['ans'] == 'B' && $row3['ans'] == 'B' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "<B><font color='green'>B. {$row['B']} </font></B><br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                     echo"yeah!! your friend also selected the same";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'B' && $row3['ans'] != 'B' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "<B><font color='red'>B. {$row['B']} </font></B><br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                     echo"sorry!! your friend selected option.{$row3['ans']}";
                     
                     $cnt2++;
                }
                else if($row2['ans'] == 'C' && $row3['ans'] == 'C' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "<B><font color='green'>C. {$row['C']} </font></B><br>";
                     echo "D. {$row['D']}<br>";
                     echo"yeah!! your friend also selected the same";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'C' && $row3['ans'] != 'C' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "<B><font color='red'>C. {$row['C']} </font></B><br>";
                     echo "D. {$row['D']}<br>";
                     echo"sorry!! your friend selected option"."{$row3['ans']}";
                     $cnt2++;
                }
                else if($row2['ans'] == 'D' && $row3['ans'] == 'D' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "<B><font color='green'>D. {$row['D']} </font></B><br>";
                     echo"yeah!! your friend also selected the same";
                     $cnt1++;
                     $cnt2++;
                }
                else if($row2['ans'] == 'D' && $row3['ans'] != 'D' )
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "<B><font color='red'>D. {$row['D']} </font></B><br>";
                     echo"sorry!! your friend selected option.{$row3['ans']}";
                     $cnt2++;
                }
             echo "<br>_________________________________<br><br><br>";
             
            }
            $percent=($cnt1/$cnt2)*100;
            echo"You have selected {$cnt1} answers right from {$cnt2} questions<br>";
            echo"percentage of right questions {$percent}%";
            $sqlit="INSERT into leader VALUES ('$cnt1','$percent','ram')";
            mysqli_query($con,$sqlit);
    }

  mysqli_close($con);
?>