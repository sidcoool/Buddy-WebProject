<?php
$db = mysqli_connect('localhost', 'root', '', 'buddys');
if(isset($_POST['submit']))
{
	$x=$_POST['first_name'];
	$y=$_POST['last_name'];
	$z=$_POST['email'];
	$u=$_POST['phone'];
	$w=$_POST['comments'];
	$sq="INSERT into contact values('$x','$y','$z','$u','$w')";
	$result=mysqli_query($db,$sq);
    header('location: index.php');
}
?>