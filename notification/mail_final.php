<html>
<body background="rvce.jpg">
<form name="myform" action="mail_final_2.php" method="post" >
<tr>
	<th>Email</th>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<th>Name</th>&emsp;&emsp;&emsp;&emsp;
	<th>Dept</th>&emsp;&emsp;&emsp;&emsp;
</tr>
<br><br>
<?php
$con = mysqli_connect("localhost", "root", "","nbase");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

session_start();
if(isset($_SESSION['first']))
{
while($x = array_pop($_SESSION['subs1'])) 
{
	$y = array_pop($_SESSION['subs1']);
	$z = array_pop($_SESSION['subs1']);
	echo("<tr>");
	echo("<td><input type=\"checkbox\" name=\"selted[$x]\" value=\"$x\"> $x</td>");
	echo "&emsp;&emsp;";
	echo("<td>$y</td>");
	echo "&emsp;&emsp;";
	echo("<td>$z</td></tr>");
	echo "&emsp;&emsp;";
	echo "<br>";
}
}

echo "<br>";
if(isset($_SESSION['second']))
{
while($x = array_pop($_SESSION['subs2'])) 
{
	$y = array_pop($_SESSION['subs2']);
	$z = array_pop($_SESSION['subs2']);
	echo("<tr>");
	echo("<td><input type=\"checkbox\" name=\"selted[$x]\" value=\"$x\"> $x</td>");
	echo "&emsp;&emsp;";
	echo("<td>$y</td>");
	echo "&emsp;&emsp;";
	echo("<td>$z</td></tr>");
	echo "&emsp;&emsp;";
	echo "<br>";
}
}
echo "<br>";
if(isset($_SESSION['third']))
{
while($x = array_pop($_SESSION['subs3'])) 
{
	$y = array_pop($_SESSION['subs3']);
	$z = array_pop($_SESSION['subs3']);
	echo("<tr>");
	echo("<td><input type=\"checkbox\" name=\"selted[$x]\" value=\"$x\"> $x</td>");
	echo "&emsp;&emsp;";
	echo("<td>$y</td>");
	echo "&emsp;&emsp;";
	echo("<td>$z</td></tr>");
	echo "&emsp;&emsp;";
	echo "<br>";
}
}
echo "<br><br>";
?>
<input type="submit">
</form>
</body>
</html>