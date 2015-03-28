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
		$con= mysql_connect('localhost','root','');
if (!$con)
{
	die('Could not connect to MySQL: ' . mysql_error());
}
$cid =mysql_select_db('nbase',$con);
if(isset($_POST['staff'])) 
{
	$sql = "select name,email,dept_id from faculty";
	$res=mysql_query($sql,$con);
		if (!$res)
		{
			echo "Error"; 
		}
	else
		{
			$i=0;
			$a1=array();
			while($row = mysql_fetch_array($res))
			{
				array_push($a1,$row["dept_id"]);
				array_push($a1,$row["name"]);
				array_push($a1,$row["email"]);
				
				
				$i = $i+1;
			}
			$_SESSION['subs1']=$a1;
			$_SESSION['first']=1;
		}
}		
if(isset($_POST["student"]))
{
$sql = "select name,email,dept_id from student";
	$res=mysql_query($sql,$con);
		if (!$res)
		{
			echo "Error"; 
		}
	else
		{
			$j=0;
			$a2=array();
			while($row = mysql_fetch_array($res))
			{
				
				array_push($a2,$row["dept_id"]);
				array_push($a2,$row["name"]);
				array_push($a2,$row["email"]);
				$j = $j+1;
			}
			$_SESSION['subs2']=$a2;
			$_SESSION['second']=2;
		}
}
if(isset($_POST["parent"]))
{
$sql="select s.name,p.email,s.dept_id 
from student as s, parent as p
where p.usn = s.usn ";
	$res=mysql_query($sql,$con);
		if (!$res)
		{
			echo "Error"; 
		}
	else
		{
			$k=0;
			$a3=array();
			while($row = mysql_fetch_array($res))
			{
				
				array_push($a3,$row["dept_id"]);
				array_push($a3,$row["name"]);
				array_push($a3,$row["email"]);
				$k = $k+1;
			}
			$_SESSION['subs3']=$a3;
			$_SESSION['third']=3;
		}
}
header('Location: /notification/mail_final.php');
mysqli_close($con);
	}
}
else
{
	header('Refresh: 0;notlog.html');
}

?>