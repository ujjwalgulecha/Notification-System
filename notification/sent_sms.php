<?php
session_start();
if (isset($_SESSION["key"]))
{
	if($_SESSION["key"]==false)
	{
		header('Refresh: 0;notlog.html');
	}
	else
	{
		$_SESSION["key"]=true;
		echo $_SESSION['ctsms']." SMSes Sent!<br><br>";
	}
}
else
{
	header('Refresh: 0;notlog.html');
}
?>
<html>
<body background="rvce.jpg">
<a href="/notification/main_notification.html">Send More Notifications</a>
<br>
<br>
</body>
</html>
