
<?php
require ('includes/header.php');
    
error_reporting(0);

$con = mysqli_connect('127.0.0.1', 'root', '');


if(!$con)
{
    echo" Connection not made";
}
if(!mysqli_select_db($con,'contact'))
{
	echo "DB not selected";
}

$email=htmlentities($_POST['email']);
$fname=htmlentities($_POST['fname']);
$lname=htmlentities($_POST['lname']);
$phone=htmlentities($_POST['phone']);
$message=htmlentities($_POST['message']);
if(empty($email)||empty($fname)||empty($lname)||empty($phone)||empty($message))
{
	header("refresh:1; url=contact.php");
	echo '<script type="text/javascript">',
     'fill();',
     '</script>';
}
else
{

$sql="INSERT INTO con(fname,lname,email,phone,message) VALUES
 ('".mysqli_real_escape_string($con,$fname)."','".mysqli_real_escape_string($con,$lname)."', '".mysqli_real_escape_string($con,$email)."','".mysqli_real_escape_string($con,$phone)."','".mysqli_real_escape_string($con,$message)."')";

 if(!mysqli_query($con,$sql))
	{
		echo "data not insered";
	}
	else
   {
	  
		echo '<script type="text/javascript">',
     'success();',
     '</script>';
	 header("refresh:2; url=contact.php");
   }
   
}
?>