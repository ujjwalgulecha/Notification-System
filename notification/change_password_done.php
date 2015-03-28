<?php

session_start();
$con = mysqli_connect("localhost", "root", "","nbase");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$qry= "SELECT * FROM admin WHERE password='$_POST[oldpwd]'";
$result=mysqli_query($con,$qry);
	if($result) {
		if(mysqli_num_rows($result) > 0) {
		$qry="UPDATE admin SET password='$_POST[newpwd]' WHERE password='$_POST[oldpwd]'";
		mysqli_query($con,$qry);
		echo "Password Changed!";
		header('Refresh: 2;/notification/main_notification.html');
		}
		else 
		{
			echo "Wrong Password!You will be redirected to the change password page.";
			header('Refresh: 2;/notification/change_password.html');
		}
	}
	else {
		die("Query failed");
		}
?>