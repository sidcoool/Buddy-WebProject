<?php
$con=mysqli_connect("localhost","root","","buddys");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

 $sql = "select * from leader order by score desc";

if($result = mysqli_query($con,$sql))
{
    while($row = mysqli_fetch_array($result))
    {
        echo $row['score'] . "<br>";
        echo $row['percent'] . "<br>";
        echo $row['name'] . "<br><br><br>";
    }
}

mysqli_close($con);
?>

