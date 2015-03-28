<?php

session_start();
$con = mysqli_connect("localhost", "root", "","nbase");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$qry= "SELECT * FROM admin WHERE uname='$_POST[uname]' AND password='$_POST[pwd]'";
$result=mysqli_query($con,$qry);
$_SESSION["key"]=false;
	if($result) {
		if(mysqli_num_rows($result) > 0) {
		echo "Login Successful!";
		$_SESSION["un"]=$_POST["uname"]; 
		$_SESSION["pw"]=$_POST["pwd"];
		$_SESSION["key"]=true;
		header('Refresh: 2;/notification/main_notification.html');
		}
		else {
			echo "Username and Password not found! You will be redirected to the login page.";
			header('Refresh: 2;/notification/admin_login.html');
		}
	}
	else {
		die("Query failed");
		}
?>