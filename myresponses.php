<?php 
$con = mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
        $sq = "select qid,ques,A,B,C,D from questions where qid IN (select qid from answers) order by qid";
        
        $sql = "select ans from answers";
        $result = mysqli_query($con,$sql);
        $x=0;
        if($res = mysqli_query($con,$sq))
        {
            while ($row=mysqli_fetch_array($res)) 
            {
                $x=$x+1;
                echo "{$x}:  {$row['ques']}<br>";
                $row2 = mysqli_fetch_array($result);
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