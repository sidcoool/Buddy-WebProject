<?php 
$con = mysqli_connect("localhost","root","","buddy");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $uid = $_SESSION['varname'];
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
                echo "{$x}:  {$row['ques']}<br>";
                $row2 = mysqli_fetch_array($result[$y]);
                if($row2['ans'] == 'A')
                {
                     echo "<B><font color='green'>A. {$row['A']} </font></B><br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                }
                else if($row2['ans'] == 'B')
                {
                     echo "A. {$row['A']}<br>";
                     echo "<B><font color='green'>B. {$row['B']} </font></B><br>";
                     echo "C. {$row['C']}<br>";
                     echo "D. {$row['D']}<br>";
                }
                else if($row2['ans'] == 'C')
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "<B><font color='green'>C. {$row['C']} </font></B><br>";
                     echo "D. {$row['D']}<br>";
                }
                else if($row2['ans'] == 'D')
                {
                     echo "A. {$row['A']}<br>";
                     echo "B. {$row['B']}<br>";
                     echo "C. {$row['C']}<br>";
                     echo "<B><font color='green'>D. {$row['D']} </font></B><br>";
                }
             echo "_________________________________<br><br><br>";
            }
    }

echo "Copy this link to share <br> link.php <br> Or press the button below to post this Quesnaire on Facebook";
//echo "post this Quesnaire on Facebook";
?>