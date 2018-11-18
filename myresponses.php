<?php 
echo" <style> body {
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
$con = mysqli_connect("localhost","root","","buddy");
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
                $row2 = mysqli_fetch_array($result);
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
                     echo "<B><font color=#ADFF2F><font size=6px>B. {$row['B']} </font><font></B><br>";
                     echo "<font size=4px> C. {$row['C']}<br><font>";
                     echo "<font size=4px>D. {$row['D']}<br></font>";
                }
                else if($row2['ans'] == 'C')
                {
                     echo "<font size=4px>A. {$row['A']}<br> </font>";
                     echo "<font size=4px>B. {$row['B']}<br> </font>";
                     echo "<font size=6px><B><font color= #ADFF2F>C. {$row['C']} </font></B><br> </font>";
                     echo "<font size=4px>D. {$row['D']}<br> </font>";
                }
                else if($row2['ans'] == 'D')
                {
                     echo "<font size=4px> A. {$row['A']}<br></font>";
                     echo "<font size=4px>B. {$row['B']}<br></font>";
                     echo "<font size=4px>C. {$row['C']}<br></font>";
                     echo "<B><font size=6px><font color=#ADFF2F>D. {$row['D']} </font></B><br></font>";
                }
             echo "_______________________________________________<br><br><br>";
            }
    }

echo "Copy this link to share <br> link.php <br> Or press the button below to post this Quesnaire on Facebook";
//echo "post this Quesnaire on Facebook";
?>